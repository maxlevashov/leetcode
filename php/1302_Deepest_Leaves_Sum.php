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

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function deepestLeavesSum($root) {
        $result = 0;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            for ($i = $queue->count() - 1, $result = 0; $i >= 0; --$i) {
                $node = $queue->dequeue();
                $result += $node->val;
                if ($node->right != null) {
                    $queue->enqueue($node->right);
                }
                if ($node->left != null) {
                    $queue->enqueue($node->left);
                }
            }
        }
        return $result;
    }

}

