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

    protected  $prev = [];

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isEvenOddTree($root) 
    {
        $current = $root;
        return $this->dfs($current, 0);
    }

    protected function dfs($current, $level) 
    {
        if ($current === null) {
            return true;
        }

        if ($current->val % 2 == $level % 2) {
            return false;
        }

        if (
            $this->prev[$level] != 0 
            && (
                ($level % 2 == 0 && $current->val <= $this->prev[$level])
                || ($level % 2 == 1 && $current->val >= $this->prev[$level])
            )
        ) {
            return false;  
        }

        $this->prev[$level] = $current->val;

        return $this->dfs($current->left, $level + 1) 
            && $this->dfs($current->right, $level + 1);
    }
}

