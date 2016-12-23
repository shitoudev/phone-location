<?php

/**
* 手机号码归属地
* 数据文件格式参考：https://github.com/lovedboy/phone
*/

namespace Shitoudev\Phone;

class PhoneLocation
{
    const DATA_FILE = __DIR__.'/phone.dat';
    protected static $spList = [1=>'移动', 2=>'联通', 3=>'电信', 4=>'电信虚拟运营商', 5=>'联通虚拟运营商', 6=>'移动虚拟运营商'];
    private $_fileHandle = null;
    private $_fileSize = 0;

    public function __construct()
    {
        $this->_fileHandle = fopen(self::DATA_FILE, 'r');
        $this->_fileSize = filesize(self::DATA_FILE);
    }

    /**
     * 查找单个手机号码归属地信息
     * @param  int $phone
     * @return array
     * @author shitoudev <shitoudev@gmail.com>
     */
    public function find($phone)
    {
        $item = [];
        if (strlen($phone) != 11) {
            return $item;
        }
        $telPrefix = substr($phone, 0, 7);

        fseek($this->_fileHandle, 4);
        $offset = fread($this->_fileHandle, 4);
        $indexBegin = implode('', unpack('L', $offset));
        $total = ($this->_fileSize - $indexBegin)/9;

        $position = $leftPos = 0;
        $rightPos = $total;

        while ($leftPos < $rightPos - 1) {
            $position = $leftPos + intval(($rightPos - $leftPos)/2);
            fseek($this->_fileHandle, ($position*9) + $indexBegin);
            $idx = implode('', unpack('L', fread($this->_fileHandle, 4)));
            // echo 'position = '.$position.' idx = '.$idx;
            if ($idx < $telPrefix) {
                $leftPos = $position;
            } elseif ($idx > $telPrefix) {
                $rightPos = $position;
            } else {
                // 找到数据
                fseek($this->_fileHandle, ($position*9+4) + $indexBegin);
                $itemIdx = unpack('Lidx_pos/ctype', fread($this->_fileHandle, 5));
                $itemPos = $itemIdx['idx_pos'];
                $type = $itemIdx['type'];
                fseek($this->_fileHandle, $itemPos);
                $itemStr = '';
                while (($tmp = fread($this->_fileHandle, 1)) != chr(0)) {
                    $itemStr .= $tmp;
                }
                $item = $this->phoneInfo($itemStr, $type);
                break;
            }
        }
        return $item;
    }

    /**
     * 解析归属地信息
     * @param  string $itemStr
     * @param  int $type
     * @return array
     * @author shitoudev <shitoudev@gmail.com>
     */
    private function phoneInfo($itemStr, $type)
    {
        $typeStr = self::$spList[$type];
        $itemArr = explode('|', $itemStr);
        $data = ['province'=>$itemArr[0], 'city'=>$itemArr[1], 'postcode'=>$itemArr[2], 'tel_prefix'=>$itemArr[3], 'sp'=>$typeStr];
        return $data;
    }

    public function __destruct()
    {
        fclose($this->_fileHandle);
    }
}
