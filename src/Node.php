<?php


namespace Src;


class Node
{
    public $value;
    public $parent;

    public function __construct(int $value, self $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
    }
}