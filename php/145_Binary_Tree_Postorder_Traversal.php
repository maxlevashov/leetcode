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
     * @return Integer[]
     */
    function postorderTraversal($root) 
    {
        $result = [];
        $nodeStack = new SplStack();
        $current = $root;

        while (!$nodeStack->isEmpty() > 0 || $current !== null) {
            if ($current !== null) {
                $nodeStack->push($current);
                array_unshift($result, $current->val);  
                $current = $current->right;
            } else {
                $node = $nodeStack->pop(); 
                $current = $node->left;   
            }
        }
        
        return $result;
    }
}

