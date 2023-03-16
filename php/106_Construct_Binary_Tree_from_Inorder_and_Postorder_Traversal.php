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
class Solution {

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        return $this->buildTreeRecursive($inorder, 0, count($inorder) - 1, 
            $postorder, 0, count($postorder) - 1);
    }

    protected function buildTreeRecursive(
        $inorder, $leftInorder, $rightInorder, 
        $postorder, $leftPostorder, $rightPostorder
    ) {
        if (
            $leftInorder > $rightInorder 
            || $leftPostorder > $rightPostorder
        ) {
            return null;
        }
        
        $rootVal = $postorder[$rightPostorder];
        $root = new TreeNode($rootVal);
        
        $rootIndex = 0;
        for ($i = $leftInorder; $i <= $rightInorder; $i++) {
            if ($inorder[$i] == $rootVal) {
                $rootIndex = $i;
                break;
            }
        }
        
        $leftSize = $rootIndex - $leftInorder;
        $rightSize = $rightInorder - $rootIndex;
        $root->left = $this->buildTreeRecursive($inorder, $leftInorder, $rootIndex - 1, 
            $postorder, $leftPostorder, $leftPostorder + $leftSize - 1);
        $root->right = $this->buildTreeRecursive($inorder, $rootIndex + 1, $rightInorder, 
            $postorder, $rightPostorder - $rightSize, $rightPostorder - 1);
        
        return $root;
    }
}

