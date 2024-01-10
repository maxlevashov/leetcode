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

    /**
     * @param TreeNode $root
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function rangeSumBST($root, $low, $high)
    {
        $sum = 0;
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            if ($node !== null) {
                if ($node->val >= $low && $node->val <= $high) {
                    $sum += $node->val;
                }
                if ($node->val >= $low) {
                    $stack->push($node->left);
                }
                if ($node->val <= $high) {
                    $stack->push($node->right);
                }
            }
        }
        return $sum;
    }

}
