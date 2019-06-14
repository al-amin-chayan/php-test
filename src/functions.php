<?php

use Src\Node;

if (!function_exists('printDepth')) {
    /**
     * Print all keys of array and properties of object with their depth.
     *
     * @param array|object $data
     * @return void
     */
    function printDepth($data): void
    {
        static $depth = 1;

        $data = is_object($data) ? get_object_vars($data) : $data;

        if (!is_array($data) || count($data) === 0) {
            $depth = 1;
            return;
        }

        foreach ($data as $key => $value) {
            echo $key . ' ' . $depth . PHP_EOL;
            if (is_array($value) || is_object($value)) {
                $depth++;
                printDepth($value);
            }
        }

        $depth = 1;
    }
}

if (!function_exists('ancestors')) {
    /**
     * Find all the ancestors of a given node.
     *
     * @param Node $node
     * @return array
     */
    function ancestors(Node $node): array
    {
        $ancestors[] = $node->value;

        $parent = $node->parent;
        while (!is_null($parent)) {
            array_push($ancestors, $parent->value);
            $parent = $parent->parent;
        }
        return $ancestors;
    }
}

if (!function_exists('lca')) {
    /**
     * Find Least Common Ancestor from two given node.
     *
     * @param Node $node1
     * @param Node $node2
     * @return int
     */
    function lca(Node $node1, Node $node2): int
    {
        $ancestors_1 = ancestors($node1);
        $ancestors_2 = ancestors($node2);

        foreach ($ancestors_1 as $ancestor) {
            if (in_array($ancestor, $ancestors_2)) {
                return $ancestor;
            }
        }

        return 0;
    }
}


if (!function_exists('formatBytes')) {
    /**
     * Format Bytes for human readability.
     *
     * @param integer $bytes
     * @param integer $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2): string
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}