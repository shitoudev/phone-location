## 手机号码归属地查询
[![Build Status](https://travis-ci.org/shitoudev/phone-location.svg?branch=master&style=flat-square)](https://travis-ci.org/shitoudev/phone-location)

PHP 实现手机号码归属地查询，数据文件来自 [https://github.com/lovedboy/phone](https://github.com/lovedboy/phone)

### Installation
```
composer require "shitoudev/phone-location:^0.1"
```

### Usage
```php
<?php
use Shitoudev\Phone\PhoneLocation;

// composer 方式安装
// include './vendor/autoload.php';

// 非 composer 方式安装的，引入文件
// include './src/PhoneLocation.php';
	
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