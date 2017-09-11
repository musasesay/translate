<?php

use Yansongda\Translate\Translate;

require "./vendor/autoload.php";

$t = new Translate([
        'appid' => '20170910000081936',
        'appsecret' => '02Kc0PHIMbZ2fdeixpwl',
    ]);
echo $t->trans("你好\n你是谁");