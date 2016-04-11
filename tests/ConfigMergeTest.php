<?php

namespace Schnittstabil\ConfigMerge;

class ConfigMergeTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigMergeUsageExample()
    {
        $target = [
            'files' => ['src', 'tests'],
            'opts' => [
                'unicorns' => 0,
                'leprechauns' => 666,
            ],
        ];
        $source = [
            'files' => ['target'],
            'opts' => [
                'unicorns' => 42,
            ],
        ];
        $expected = [
            'files' => ['target'],
            'opts' => [
                'unicorns' => 42,
                'leprechauns' => 666,
            ],
        ];

        $this->assertEquals($expected, config_merge($target, $source));
    }

    public function testEmptyArraysShouldNotOverride()
    {
        $target = [
            'files' => ['src', 'tests'],
        ];
        $source = [];
        $expected = $target;

        $this->assertEquals($expected, config_merge($target, $source));
    }

    public function testNestedEmptyArraysShouldOverride()
    {
        $target = [
            'files' => ['src', 'tests'],
        ];
        $source = [
            'files' => [],
        ];
        $expected = [
            'files' => [],
        ];

        $this->assertEquals($expected, config_merge($target, $source));
    }
}
