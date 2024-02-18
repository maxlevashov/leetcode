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
    function isValidBST($root) 
    {
        if ($root == null) {
            return true;
        }
        $stack = new SplStack();
        $pre = null;
        
        while ($root != null || !$stack->isEmpty()) {
            while ($root != null) {
                $stack->push($root);
                $root = $root->left;
            }
            $root = $stack->pop();
            if ($pre != null && $root->val <= $pre->val) {
                return false;
            }
            $pre = $root;
            $root = $root->right; 
        }

        return true;
    }
}

