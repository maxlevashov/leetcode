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
     * @return Boolean
     */
    function isCompleteTree($root)
    {
        $end = false;
        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node === null) {
                $end = true;
            } else {
                if ($end) {
                    return false;
                }
                $queue->enqueue($node->left);
                $queue->enqueue($node->right);
            }
        }

        return true;
    }

}
