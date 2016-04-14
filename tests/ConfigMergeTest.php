<?php

namespace Schnittstabil\ConfigMerge;

class ConfigMergeTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigMergeUsageExample()
    {
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
        $expected = json_decode(<<<'EOD'
    {
        "files": ["target"],
        "opts": {
            "unicorns": 42,
            "leprechauns": 666
        }
    }
EOD
        );

        $this->assertEquals($expected, config_merge($target, $source));
    }

    public function testEmptyArraysShouldOverwrite()
    {
        $target = json_decode('{"files": ["src", "tests"]}');
        $source = json_decode('{"files": []}');
        $expected = $source;

        $this->assertEquals($expected, config_merge($target, $source));
    }

    public function testUndefinedPropertiesShouldBeSet()
    {
        $target = json_decode('{}');
        $source = json_decode('{"files": []}');
        $expected = $source;

        $this->assertEquals($expected, config_merge($target, $source));
    }
}
