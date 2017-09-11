<h1 align="center">Translate</h1>

基于百度翻译的 SDK

## 对外接口
- trans(string $q, string $to, string $from = 'auto')  
$q: 待翻译的字符串  
$to: 目的语言  
$from: 源语言  

## 使用方法
```php
<?php

use Yansongda\Translate\Translate;

$config = [
    'appid' => 'xxxx',
    'appsecret' => 'xxxx',
];

$t = new Translate($config);

echo $t->trans("你好", 'en');
```

支持的翻译列表请传送至 [这里](http://api.fanyi.baidu.com/api/trans/product/apidoc)

## License
MIT