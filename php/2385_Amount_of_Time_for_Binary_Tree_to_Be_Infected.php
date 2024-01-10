<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution 
{

    protected int $maxDistance = 0;

    /**
     * @param TreeNode $root
     * @param Integer $start
     * @return Integer
     */
    function amountOfTime($root, $start)
    {
        $this->traverse($root, $start);

        return $this->maxDistance;
    }

    protected function traverse($root, int $start) 
    {
        $depth = 0;
        if ($root === null) {
            return $depth;
        }

        $leftDepth = $this->traverse($root->left, $start);
        $rightDepth = $this->traverse($root->right, $start);

        if ($root->val == $start) {
            $this->maxDistance = max($leftDepth, $rightDepth);
            $depth = -1;
        } elseif ($leftDepth >= 0 && $rightDepth >= 0) {
            $depth = max($leftDepth, $rightDepth) + 1;
        } else {
            $distance = abs($leftDepth) + abs($rightDepth);
            $this->maxDistance = max($this->maxDistance, $distance);
            $depth = min($leftDepth, $rightDepth) - 1;
        }

        return $depth;
    }
}

