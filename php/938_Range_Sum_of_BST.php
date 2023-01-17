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
        $stack = [$root];
        while (!empty($stack)) {
            $node = array_pop($stack);
            if ($node !== null) {
                if ($node->val >= $low && $node->val <= $high) {
                    $sum += $node->val;
                }
                if ($node->val >= $low) {
                    $stack[] = $node->left;
                }
                if ($node->val <= $high) {
                    $stack[] = $node->right;
                }
            }
        }
        return $sum;
    }

}
