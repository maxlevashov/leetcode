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
    function minDepth($root) 
    {
        if ($root == null) {
            return 0;
        }

        $queue = new SplQueue();
        $queue->enqueue($root);
        $i = 0;
        
        while (!$queue->isEmpty()) {
            $i++;
            $k = $queue->count();
            for ($j = 0; $j < $k; $j++) {
                $node = $queue->dequeue();
                if ($node->left) {
                    $queue->push($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
                if ($node->left == null && $node->right == null) {
                    return $i;
                }
            }
        }

        return -1;
    }
}

