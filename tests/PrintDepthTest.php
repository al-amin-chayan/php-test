<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Src\Person;

class PrintDepthTest extends TestCase
{

    public function test_printDepth_to_print_empty_with_string()
    {
        $expected = "";
        $this->expectOutputString($expected);
        printDepth("String Date");
    }

    public function test_printDepth_to_print_object_property()
    {
        $person = new Person("User", "1", NULL);

        $expected = "first_name 1\nlast_name 1\nfather 1\n";
        $this->expectOutputString($expected);
        printDepth($person);
    }

    public function test_printDepth_to_print_key_with_depth()
    {
        $a = array(
            "key1" => 1,
            "key2" => array(
                "key3" => 1,
                "key4" => array(
                    "key5" => 4
                ),
            ),
        );

        $expected = "key1 1\nkey2 1\nkey3 2\nkey4 2\nkey5 3\n";
        $this->expectOutputString($expected);
        printDepth($a);
    }
}