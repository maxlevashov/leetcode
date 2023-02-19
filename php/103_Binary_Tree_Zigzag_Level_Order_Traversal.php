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
        $queue = [$root];
        $i = 0;

        while (!empty($queue)) {
            $queueCount = count($queue);
            $temp = [];
            while ($queueCount--){
                $first = array_shift($queue);
                $temp[] = $first->val;
               
                if ($first->left !== null) {
                    $queue[] = $first->left;
                }
                if ($first->right !== null) { 
                    $queue[] = $first->right;
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

