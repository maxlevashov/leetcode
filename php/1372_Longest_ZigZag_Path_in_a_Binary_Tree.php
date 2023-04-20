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
    function longestZigZag($root) 
    {
        $result = $this->dfs($root);

        return $result['max'];
    }

    protected function dfs($node) {
        if ($node == null) {
            return ['left' => -1, 'right' => -1, 'max' => -1];
        }
        
        $leftSubtree = $this->dfs($node->left);
        $rightSubtree = $this->dfs($node->right);
        
        $leftLength = $leftSubtree['right'] + 1;
        $rightLength = $rightSubtree['left'] + 1;
        $maxLen = max($leftLength, $rightLength, $leftSubtree['max'], $rightSubtree['max']);
        
        return ['left' => $leftLength, 'right' => $rightLength, 'max' => $maxLen];
    }
}

