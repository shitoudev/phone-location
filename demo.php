<?php

use Shitoudev\Phone\PhoneLocation;

include './src/PhoneLocation.php';

$pl = new PhoneLocation();
$info = $pl->find(18621281566);
print_r($info);
