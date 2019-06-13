<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class Test extends TestCase {
    public function test_odd_or_even_to_true() {
        $a = array (
            "key1" => 1,
            "key2" => array (
                "key3" => 1,
                "key4" => array (
                    "key5" => 4
                ),
            ),
        );

        $this->assertTrue( printDepth( $a ) == '' );
    }
}