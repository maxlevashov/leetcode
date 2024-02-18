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
    function maxPathSum($root) 
    {
 	$maxPath = PHP_INT_MIN;
     			
        $this->get_max_gain($root, $maxPath); 

        return $maxPath;		
    }

    function get_max_gain($node, &$maxPath) 
    {
        if ($node == null) {
            return 0;
        }
            
        $gainLeft = max($this->get_max_gain($node->left, $maxPath), 0);
        $gainRight = max($this->get_max_gain($node->right, $maxPath), 0); 
            
        $current = $node->val + $gainLeft + $gainRight; 
        $maxPath = max($maxPath, $current); 
            
        return $node->val + max($gainLeft, $gainRight);
    } 
}

