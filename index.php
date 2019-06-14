<?php

use Src\Node;
use Src\Person;

require_once 'vendor/autoload.php';

$start = microtime(true);

$a = [
    "key1" => 1,
    "key2" => [
        "key3" => 1,
        "key4" => [
            "key5" => 4
        ],
    ],
];

echo "1. Print array keys with their depth" . PHP_EOL;
printDepth($a);
unset($a);

echo PHP_EOL;

$person_a = new Person("User", "1", NULL);
$person_b = new Person("User", "1", $person_a);

$a = array (
    "key1" => 1,
    "key2" => array (
        "key3" => 1,
        "key4" => array (
            "key5" => 4,
            "User" => $person_b,
        ),
    ),
);

echo "2. Print array keys as well as object properties with their depth" . PHP_EOL;
printDepth($a);
unset($a);

echo PHP_EOL;


$node1 = new Node(1);
$node2 = new Node(2, $node1);
$node3 = new Node(3, $node1);
$node4 = new Node(4, $node2);
$node5 = new Node(5, $node2);
$node6 = new Node(6, $node3);
$node7 = new Node(7, $node3);
$node8 = new Node(8, $node4);
$node9 = new Node(9, $node4);

echo "3. Find Least Common Ancestor of Node 6 and 7" . PHP_EOL;
echo lca($node6, $node7);

unset($node1, $node2, $node3, $node4, $node5, $node6, $node7, $node8, $node9);

echo PHP_EOL . '----------------------------------------' . PHP_EOL;

return printf(
    "Total time: %s\r\nMemory Used (current): %s\r\nMemory Used (max): %s",
    round(microtime(true) - $start, 4), formatBytes(memory_get_usage()), formatBytes(memory_get_peak_usage())
);
