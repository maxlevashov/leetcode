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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        $result = [];
        if ($root == null) {
            return $result;
        }
        $queue = new SplQueue();
        $queue->enqueue($root);
        $i = 0;

        while (!$queue->isEmpty()) {
            $queueCount = $queue->count();
            var_dump($queueCount);
            $temp = [];
            while ($queueCount--){
                $first = $queue->dequeue();
                $temp[] = $first->val;
               
                if ($first->left !== null) {
                    $queue->enqueue($first->left);
                }
                if ($first->right !== null) { 
                    $queue->enqueue($first->right);
                }
            }
            if ($i++ % 2 !== 0) {
                $temp = array_reverse($temp);
            }
            $result[] = $temp;
        }
        
        return $result; 
    }
}

