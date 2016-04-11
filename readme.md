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

config_merge(
	[
		'files' => ['src', 'tests'],
		'opts' => [
			'unicorns' => 0,
			'leprechauns' => 666,
		]
	],
	[
		'files' => ['target'],
		'opts' => [
			'unicorns' => 42,
		]
	]
);
/* =>
[
	'files' => ['target'],
	'opts' => [
		'unicorns' => 42,
		'leprechauns' => 666,
	]
]
*/
```


## API

```php
/**
 * Merge two config arrays.
 *
 * @param array $target Target config array
 * @param array $source Source config array
 *
 * @return array The merged config
 */
function config_merge(array $target, array $source)
```


## License

MIT © [Michael Mayer](http://schnittstabil.de)
