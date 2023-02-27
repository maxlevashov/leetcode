<?php

/**
 * Definition for a QuadTree node.
 * class Node {
 *     public $val = null;
 *     public $isLeaf = null;
 *     public $topLeft = null;
 *     public $topRight = null;
 *     public $bottomLeft = null;
 *     public $bottomRight = null;
 *     function __construct($val, $isLeaf) {
 *         $this->val = $val;
 *         $this->isLeaf = $isLeaf;
 *         $this->topLeft = null;
 *         $this->topRight = null;
 *         $this->bottomLeft = null;
 *         $this->bottomRight = null;
 *     }
 * }
 */

class Solution 
{
    /**
     * @param Integer[][] $grid
     * @return Node
     */
    function construct($grid) 
    {  
        return $this->make($grid, 0, 0, count($grid));
    }

    protected function make(array $grid, $r, $c, $gridCount) 
    {
        if ($gridCount == 1) {
            return new Node($grid[$r][$c] == 1 ? true : false, true);
        }
        $gridCountHalf = intval($gridCount / 2);
        $topLeft = $this->make($grid, $r, $c, $gridCountHalf);
        $topRight = $this->make($grid, $r, $c + $gridCountHalf, $gridCountHalf);
        $bottomLeft = $this->make($grid, $r + $gridCountHalf, $c, $gridCountHalf);
        $bottomRight = $this->make($grid, $r + $gridCountHalf, $c + $gridCountHalf, $gridCountHalf);
        if (
            $topLeft->val == $topRight->val 
            && $bottomLeft->val == $bottomRight->val 
            && $topLeft->val == $bottomLeft->val 
            && $topLeft->isLeaf 
            && $topRight->isLeaf 
            && $bottomLeft->isLeaf 
            && $bottomRight->isLeaf
        ) {
            return new Node($topLeft->val, true);
        } else {
            $node = new Node(true, false);
            $node->topLeft = $topLeft;
            $node->topRight = $topRight;
            $node->bottomLeft = $bottomLeft;
            $node->bottomRight = $bottomRight;
            return $node;
        }
    }
}

