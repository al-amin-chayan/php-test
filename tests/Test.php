<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class Test extends TestCase {
    public function test_printDepth_to_true() {
        $a = array (
            "key1" => 1,
            "key2" => array (
                "key3" => 1,
                "key4" => array (
                    "key5" => 4
                ),
            ),
        );

        $expected = "key1 1\nKey2 1\nkey3 2\nkey4 2\nkey5 3";
        $this->expectOutputString($expected);
        printDepth( $a );
    }
}