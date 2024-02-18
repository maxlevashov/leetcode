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
    
    protected $inorder;
    protected $postorder;

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) 
    {
        $this->inorder = $inorder;
        $this->postorder = $postorder;

        return $this->buildTreeRecursive(
            0, count($inorder) - 1, 
            0, count($postorder) - 1);
    }

    protected function buildTreeRecursive(
        $leftInorder, $rightInorder, 
        $leftPostorder, $rightPostorder
    ) {
        if (
            $leftInorder > $rightInorder 
            || $leftPostorder > $rightPostorder
        ) {
            return null;
        }
        
        list($root, $rootIndex) = $this->getRootData(
            $leftInorder, $rightInorder, $rightPostorder);        
        $leftSize = $rootIndex - $leftInorder;
        $rightSize = $rightInorder - $rootIndex;

        $root->left = $this->buildTreeRecursive(
            $leftInorder, $rootIndex - 1, 
            $leftPostorder, $leftPostorder + $leftSize - 1);
        $root->right = $this->buildTreeRecursive( 
            $rootIndex + 1, $rightInorder, 
            $rightPostorder - $rightSize, $rightPostorder - 1);
        
        return $root;
    }

    protected function getRootData($leftInorder, $rightInorder, $rightPostorder) 
    {
        $rootVal = $this->postorder[$rightPostorder];
        $root = new TreeNode($rootVal);
        
        $rootIndex = 0;
        for ($i = $leftInorder; $i <= $rightInorder; $i++) {
            if ($this->inorder[$i] == $rootVal) {
                $rootIndex = $i;
                break;
            }
        }

        return [$root, $rootIndex];
    }
}

