<?php

if (! function_exists('printDepth')) {
    function printDepth($data)
    {
        static $depth = 1;
        foreach ($data as $key => $value) {
            echo $key . ' ' . $depth . PHP_EOL;
            if(is_array($value)) {
                $depth++;
                printDepth($value);
            }
        }
    }
}