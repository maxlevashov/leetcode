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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q)
    {

        return $this->BFS($p, $q);
    }

    protected function BFS($treeFirst, $treeTwo)
    {
        if (
            isset($treeFirst)
            && isset($treeTwo)
            && $treeFirst->val === $treeTwo->val
        ) {
            if (!$this->BFS($treeFirst->left, $treeTwo->left)) {
                return false;
            }
            if (!$this->BFS($treeFirst->right, $treeTwo->right)) {
                return false;
            }
        } elseif(!isset($treeFirst) && !isset($treeTwo)) {
            return true;
        } else {
            return false;
        }
        return true;
    }
}