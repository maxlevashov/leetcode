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
     * @return Integer[]
     */
    function findMode($root) {
        $result = [];
        $max = 0;
        $counter = [];
        $this->dfs($root, $counter);
        foreach ($counter as $item) {
            $max = max($max, $item);
        }
        foreach ($counter as $key => $val) {
            if ($val == $max) {
                $result[] = $key;
            }
        }
        return $result;

    }

    protected function dfs($root, &$counter) 
    {
        if ($root == null) {
            return;
        }
        $counter[$root->val]++;
        $left = $this->dfs($root->left, $counter);
        $right = $this->dfs($root->right, $counter);
    }
}

