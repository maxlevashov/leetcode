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

    protected $count = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function averageOfSubtree($root) 
    {
        $this->postOrder($root);

        return $this->count;
    }

    protected function postOrder($root) 
    {
        if ($root == NULL) {
            return [0, 0];
        }
        
        $left = $this->postOrder($root->left);
        $right = $this->postOrder($root->right);
        
        $nodeSum = $left[0] + $right[0] + $root->val;
        $nodeCount = $left[1] + $right[1] + 1;

        if ($root->val == intval($nodeSum / $nodeCount)) {
            $this->count++;
        }
        
        return [$nodeSum, $nodeCount];
    }
}

