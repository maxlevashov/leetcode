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
    function isSymmetric($root) 
    {
        if ($root === null) {
            return true;
        }
        
        return $this->isSymmetricRecursive($root->left, $root->right);
    }

    protected function isSymmetricRecursive($leftNode, $rightNode) {
        if ($leftNode == null && $rightNode == null) {
            return true;
        }

        if (
            $leftNode == NULL 
            || $rightNode == NULL 
            || $leftNode->val != $rightNode->val
        ) {
            return false;
        }
        
        return $this->isSymmetricRecursive($leftNode->left, $rightNode->right) 
            && $this->isSymmetricRecursive($leftNode->right, $rightNode->left);
    }
}
