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
     * @return Integer[][]
     */
    function levelOrderBottom($root) 
    {
        $nodeValues = [];
        if (!$root) {
            return $nodeValues;
        }
        
        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $values = [];
            for ($i = 0; $i < $size; $i++){
                $node = $queue->dequeue();
                $values[] = $node->val;
                
                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right); 
                }
            }
            
            $nodeValues[] = $values;
        }        

        return array_reverse($nodeValues);
    }
}

