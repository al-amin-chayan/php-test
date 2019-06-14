<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Src\Node;
use TypeError;

class LcaTest extends TestCase
{

    public function test_ancestors_invalid_argument_exception()
    {
        $this->expectException(TypeError::class);
        ancestors('TEST Invalid Argument');
    }

    public function test_ancestors_to_have_1_and_2_in_return_when_2_is_a_chield_of_1()
    {
        $node1 = new Node(1);
        $node2 = new Node(2, $node1);
        $result = ancestors($node2);
        $this->assertContains(1, $result);
        $this->assertContains(2, $result);
    }

    public function test_lca_invalid_argument_exception()
    {
        $this->expectException(TypeError::class);
        lca('TEST Invalid Argument');
    }

    public function test_lca_return_3_for_node_6_and_7()
    {
        $node1 = new Node(1);
        $node3 = new Node(3, $node1);
        $node6 = new Node(6, $node3);
        $node7 = new Node(7, $node3);

        $result = lca($node6, $node7);

        $this->assertEquals(3, $result);
    }

    public function test_lca_return_3_for_node_3_and_7()
    {
        $node1 = new Node(1);
        $node3 = new Node(3, $node1);
        $node7 = new Node(7, $node3);

        $result = lca($node3, $node7);

        $this->assertEquals(3, $result);
    }
}