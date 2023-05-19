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

    protected $paths = [];

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer[][]
     */
    function pathSum($root, $targetSum) 
    {      
        $path = [];

        $this->dfs($root, $targetSum, $path);

        return $this->paths;
    }

    protected function dfs($root, $targetSum, &$path) 
    {
        if ($root == null) {
            return;
        }
        $path[] = $root->val;
        $targetSum -= $root->val;
        if ($root->left == null && $root->right == null) { 
            if ($targetSum == 0) {
                $this->paths[] = $path;
            }
        } else {
            $this->dfs($root->left, $targetSum, $path);
            $this->dfs($root->right, $targetSum, $path);
        }

        array_pop($path);
    }
}

