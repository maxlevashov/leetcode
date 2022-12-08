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

    
    protected function findLeafs($root, $arLeafs) 
    {
        if (empty($root->left) && empty($root->right)) {
            $arLeafs[] = $root->val;
        } 
        if (!empty($root->left)) {
            $arLeafs = $this->findLeafs($root->left, $arLeafs);
        }
        if (!empty($root->right)) {
            $arLeafs = $this->findLeafs($root->right, $arLeafs);
        }

        return $arLeafs;
    }
    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2) {

        $arLeafs1 = $this->findLeafs($root1, []);
        $arLeafs2 = $this->findLeafs($root2, []);
        
        return $arLeafs1 == $arLeafs2;
    }
}

