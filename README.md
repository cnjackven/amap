<h1 align="center">VenAmap</h1>

<p align="center">📦 It may be the best SDK for developing Amap App.</p>

## Requirement

1. PHP >= 7.2
2. **[Composer](https://getcomposer.org/)**

## Installing

```shell
$ composer require jackven/amap -vvv
```

## Usage

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

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cnjackven/venamap/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cnjackven/venamap/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
