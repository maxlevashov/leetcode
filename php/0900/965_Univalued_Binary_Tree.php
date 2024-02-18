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
     * @return Boolean
     */
    function isUnivalTree($root)
    {
        $stack = [$root];
        $uniValue = $root->val;
        while (!empty($stack)) {
            $node = array_pop($stack);
            if ($node !== null) {
                if ($node->val != $uniValue) {
                    return false;
                }
                $stack[] = $node->left;
                $stack[] = $node->right;
            }
        }

        return true;
    }

}
