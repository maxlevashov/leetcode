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
    function maxAncestorDiff($root) 
    {
        $m = 0;
        $this->dfs($root, $m);
        return $m;
    }

    protected function dfs($root, int &$m) 
    {
        if ($root === null) {
            return [PHP_INT_MAX, PHP_INT_MIN];
        }

        $left = $this->dfs($root->left, $m);
        $right = $this->dfs($root->right, $m);

        $minVal = min($root->val, min($left[0], $right[0]));
        $maxVal = max($root->val, max($left[1], $right[1]));

        $m = max([$m, abs($minVal - $root->val), abs($maxVal - $root->val)]);

        return [$minVal, $maxVal];
    }
}

