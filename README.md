## 手机号码归属地查询
PHP 实现手机号码归属地查询，数据文件来自 [https://github.com/lovedboy/phone](https://github.com/lovedboy/phone)

### Usage
```php
use Shitoudev\Phone\PhoneLocation;
	
include './src/PhoneLocation.php';
	
$pl = new PhoneLocation();
$info = $pl->find(18621281566);
print_r($info);

// Output;
Array
(
    [province] => 上海
    [city] => 上海
    [postcode] => 200000
    [tel_prefix] => 021
    [sp] => 联通
)
```

### Thanks
[https://github.com/lovedboy/phone](https://github.com/lovedboy/phone)

### License
[MIT license.](https://raw.githubusercontent.com/shitoudev/phone-location/master/LICENSE)