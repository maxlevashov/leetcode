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
     * @param String $traversal
     * @return TreeNode
     */
    function recoverFromPreorder($traversal) 
    {
        $level = 0;
        $val = 0;
        $stack = new SplStack();

        for ($i = 0; $i < strlen($traversal);) {
            for ($level = 0; $traversal[$i] == '-'; $i++) {
                $level++;
            }
            for ($val = 0; $i < strlen($traversal) && $traversal[$i] != '-'; $i++) {
                $val = $val * 10 + ($traversal[$i] - '0');
            }
            while ($stack->count() > $level) {
                $stack->pop();
            }
            $node = new TreeNode($val);
            if (!$stack->isEmpty()) {
                if ($stack->top()->left == null) {
                    $stack->top()->left = $node;
                } else {
                    $stack->top()->right = $node;
                }
            }
            $stack->push($node);
        }
        while ($stack->count() > 1) {
            $stack->pop();
        }

        return $stack->pop();
    }
}

