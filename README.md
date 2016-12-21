## 手机号码归属地查询
[![Latest Stable Version](https://img.shields.io/packagist/v/shitoudev/phone-location.svg)](https://packagist.org/packages/shitoudev/phone-location)
[![Build Status](https://travis-ci.org/shitoudev/phone-location.svg?style=flat-square&branch=master)](https://travis-ci.org/shitoudev/phone-location)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)


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