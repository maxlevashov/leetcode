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
    function isBalanced($root)
    {
        if ($root == null) {
            return true;
        }
        if ($this->height($root) == -1) {
            return false;
        }

        return true;
    }

    protected function height($root)
    {
        if ($root == null) {
            return 0;
        }

        $leftHeight = $this->height($root->left);
        $rightHeight = $this->height($root->right);

        if (
            $leftHeight == -1 
            || $rightHight == -1 
            || abs($leftHeight - $rightHeight) > 1
        ) {
            return -1;
        }

        return max($leftHeight, $rightHeight) + 1;
    }

}
