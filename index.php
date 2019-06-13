<?php
require_once 'vendor/autoload.php';

$a = [
    "key1" => 1,
    "key2" => [
        "key3" => 1,
        "key4" => [
            "key5" => 4
        ],
    ],
];

var_dump(printDepth($a));