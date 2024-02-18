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
     * @return String
     */
    function tree2str($root) 
    {
        $result = (string) $root->val;

        if ($root->left) {
            $left = $this->tree2str($root->left);
            $result .= '(' . $left . ')';
        }
        
        if ($root->right) {
            if (!$root->left) {
                $result .= '()'; 
            }
            $right = $this->tree2str($root->right);
            $result .= '(' . $right . ')';
        }

        return $result;
    }
}

