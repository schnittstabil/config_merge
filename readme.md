# Schnittstabil\ConfigMerge [![Build Status](https://travis-ci.org/schnittstabil/config_merge.svg?branch=master)](https://travis-ci.org/schnittstabil/config_merge) [![Coverage Status](https://coveralls.io/repos/schnittstabil/config_merge/badge.svg?branch=master&service=github)](https://coveralls.io/github/schnittstabil/config_merge?branch=master) [![Code Climate](https://codeclimate.com/github/schnittstabil/config_merge/badges/gpa.svg)](https://codeclimate.com/github/schnittstabil/config_merge)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/17804faf-c64e-4837-a2ba-7764ee64ef75/big.png)](https://insight.sensiolabs.com/projects/17804faf-c64e-4837-a2ba-7764ee64ef75)

> Merge config arrays


## Install

```
$ composer require schnittstabil/config_merge
```


## Usage

```php
use function Schnittstabil\ConfigMerge\config_merge;

$target = json_decode(<<<'EOD'
{
    "files": ["src", "tests"],
    "opts": {
        "unicorns": 0,
        "leprechauns": 666
    }
}
EOD
);

$source = json_decode(<<<'EOD'
{
    "files": ["target"],
    "opts": {
        "unicorns": 42
    }
}
EOD
);

json_encode(config_merge($target, $source), JSON_PRETTY_PRINT);
/* =>
{
    "files": [
        "target"
    ],
    "opts": {
        "unicorns": 42,
        "leprechauns": 666
    }
}
*/
```


## API

```php
/**
 * Merge two configs.
 *
 * @param mixed $target       Target config
 * @param mixed $source       Source config
 * @param bool  $appendArrays if true use `array_merge`
 *
 * @return mixed The merged config
 */
function config_merge($target, $source, $appendArrays = false)
```


## License

MIT © [Michael Mayer](http://schnittstabil.de)
