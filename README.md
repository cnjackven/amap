<h1 >VenAmap</h1>

<p>📦 It may be the best SDK for developing Amap App.</p>

[![Latest Stable Version](https://poser.pugx.org/jackven/amap/v)](//packagist.org/packages/jackven/amap) [![Total Downloads](https://poser.pugx.org/jackven/amap/downloads)](//packagist.org/packages/jackven/amap) [![Latest Unstable Version](https://poser.pugx.org/jackven/amap/v/unstable)](//packagist.org/packages/jackven/amap) [![License](https://poser.pugx.org/jackven/amap/license)](//packagist.org/packages/jackven/amap)

## 安装要求

1. PHP >= 7.2
2. **[Composer](https://getcomposer.org/)**

## 安装

```shell
$ composer require jackven/amap -vvv
```

## 使用

基本使用

```php
<?php

use VenAmap\AmapClient;

$config = [
    'key'           => 'xxxxxxxxxxxxxxxxxxxxxxx',
    'private_key'   => 'xxxxxxxxxxxxxxx',                   // 未启用数字签名不用设置该项
];

$app = AmapClient::getInstance($config);
$respone = $app->driver('ReGeo')->setLocation('116.481488,39.990464')->send();

```

也可以这样使用

```php
<?php
use VenAmap\AmapClient;
use VenAmap\Request\ReGeo;

$config = [
    'key'           => 'xxxxxxxxxxxxxxxxxxxxxxx',
    'private_key'   => 'xxxxxxxxxxxxxxx',                   // 未启用数字签名不用设置该项
];

AmapClient::getInstance($config);

$respone = (new ReGeo())->setLocation('116.481488,39.990464')->send();

```

## 目前支持的amap接口

-  Geo          地址转换为经纬度
-  ReGeo        经纬度逆转为地址
-  IP           IP定位
-  Walking      步行线路规划
-  Distance     距离计算
-  Convert      经纬度坐标转换
-  WeatherInfo  天气信息查询
-  District     行政区域字典获取
-  PoiText      关键字词POI检索

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cnjackven/amap/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cnjackven/amap/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
