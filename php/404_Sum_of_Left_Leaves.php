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
    function sumOfLeftLeaves($root)
    {

        return
            $this->sumRec($root->left, true)
                + $this->sumRec($root->right);
    }

    protected function sumRec($root, $isLeft = false)
    {
        if ($root === null) {
            return 0;
        }

        $result = $isLeft
                && $root->left === null
                && $root->right === null
                ? $root->val : 0;

        return
            $result
                + $this->sumRec($root->left, true) 
                + $this->sumRec($root->right);
    }

}
