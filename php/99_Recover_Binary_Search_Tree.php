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


    private $firstElement = null;
    private $secondElement = null;
    private $prevElement = null;

    /**
     * @param TreeNode $root
     * @return NULL
     */
    function recoverTree($root) 
    {
        $this->prevElement = new TreeNode(PHP_INT_MIN);
        $this->traverse($root);
        
        $temp = $this->firstElement->val;
        $this->firstElement->val = $this->secondElement->val;
        $this->secondElement->val = $temp;
    }

    private function traverse($root) 
    {
        if ($root == null) {
            return;
        }
            
        $this->traverse($root->left);
        
        if (
            $this->firstElement == null 
            && $this->prevElement->val >= $root->val
        ) {
            $this->firstElement = $this->prevElement;
        }
    
        if (
            $this->firstElement != null 
            && $this->prevElement->val >= $root->val
        ) {
            $this->secondElement = $root;
        }        
        $this->prevElement = $root;

        $this->traverse($root->right);
    }
}

