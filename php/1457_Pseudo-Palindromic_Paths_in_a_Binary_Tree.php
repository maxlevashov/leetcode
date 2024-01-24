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

    protected $count = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function pseudoPalindromicPaths ($root) 
    {
        $this->preorder($root, 0);
        return $this->count;
    }


    protected function preorder($node, int $path) 
    {
        if ($node != null) {
            $path = $path ^ (1 << $node->val);
            if ($node->left == null && $node->right == null) {
                if (($path & ($path - 1)) == 0) {
                    ++$this->count;
                }
            }
            $this->preorder($node->left, $path);
            $this->preorder($node->right, $path) ;
        }
    }

}

