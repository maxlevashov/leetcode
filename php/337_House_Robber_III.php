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
    function rob($root) 
    {
        $result = $this->robRecursive($root);

        return max($result[0], $result[1]);
    }

    /**
     * 
     * @param TreeNode|null $root
     * @return type
     */
    protected function robRecursive(?TreeNode $root) 
    {
        if ($root == null) {
            return [0, 0];
        }
        
        $left = $this->robRecursive($root->left);
        $right = $this->robRecursive($root->right);
        $result = [];

        $result[0] = max($left[0], $left[1]) + max($right[0], $right[1]);
        $result[1] = $root->val + $left[0] + $right[0];
        
        return $result;
    }
}

