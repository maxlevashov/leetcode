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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) 
    {
        $rootIdx = 0;
        return $this->build($preorder, $inorder, $rootIdx, 0, count($inorder) - 1);
    }

    protected function build(&$preorder, &$inorder, &$rootIdx, $left, $right) {
        if ($left > $right) {
            return null;
        }
        $pivot = $left;
        while ($inorder[$pivot] != $preorder[$rootIdx]) {
            $pivot++;
        }
        
        $rootIdx++;
        $newNode = new TreeNode($inorder[$pivot]);
        $newNode->left = $this->build($preorder, $inorder, $rootIdx, $left, $pivot - 1);
        $newNode->right = $this->build($preorder, $inorder, $rootIdx, $pivot + 1, $right);

        return $newNode;
    }
}

