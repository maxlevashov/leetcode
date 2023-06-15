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
    function maxLevelSum($root) 
    {
        $maxSum = PHP_INT_MIN;
        $result = 0;
        $level = 0;

        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $level++;
            $sumAtCurrentLevel = 0;
            
            for ($i = $queue->count(); $i > 0; --$i) {
                $node = $queue->dequeue();
                
                $sumAtCurrentLevel += $node->val;

                if ($node->left != null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right != null) {
                    $queue->enqueue($node->right);
                }
            }

            if ($maxSum < $sumAtCurrentLevel) {
                $maxSum = $sumAtCurrentLevel;
                $result = $level;
            }
        }

        return $result;
    }
}

