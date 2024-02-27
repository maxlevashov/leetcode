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
     * @return Integer
     */
    function diameterOfBinaryTree($root) 
    {
        $result = 0;
        $this->diameter($root, $result);
        return $result;
    }

    protected function diameter($curr, int &$result) 
    {
        if (!$curr) {
            return 0;
        }
        
        $left = $this->diameter($curr->left, $result);
        $right = $this->diameter($curr->right, $result);

        $result = max($result, $left + $right);
        
        return max($left, $right) + 1;
    }
}

