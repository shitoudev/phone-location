<?php

use Shitoudev\Phone\PhoneLocation;

/**
* Phone Test
*/
class PhoneTest extends PHPUnit_Framework_TestCase
{
    protected $phone = null;

    public function setUp()
    {
        $this->phone = new PhoneLocation();
    }

    public function testFileHandle()
    {
        $this->assertAttributeNotEquals(null, '_fileHandle', $this->phone);
    }

    public function testPhoneInfo()
    {
        $info = function () {
            return $this->phone->phoneInfo('上海|上海|200000|021', 1);
        };
        $this->assertNotEmpty($info);
    }

    public function testPhoneFind()
    {
        $info = $this->phone->find(18621281566);
        $this->assertNotEmpty($info);
    }
}
