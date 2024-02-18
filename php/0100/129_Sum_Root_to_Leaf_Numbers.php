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

    protected $sum = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root)
    {

        $this->preorderTraversal($root);

        return $this->sum;
    }

    protected function preorderTraversal($root, $tempSum = '')
    {
        if ($root == null) {
            return;
        }

        $tempSum .= $root->val;
        if ($root->left == null && $root->right == null) {
            $this->sum += intval($tempSum);
            return;
        }

        $this->preorderTraversal($root->left, $tempSum);
        $this->preorderTraversal($root->right, $tempSum);
    }

}
