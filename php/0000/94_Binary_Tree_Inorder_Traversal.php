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
    function inorderTraversal($root)
    {
        if ($root == null) {
            return [];
        }

        $arReturn = [];
        $stack = new SplStack();
        $current = $root;

        while ($current || !$stack->isEmpty()) {
            while ($current != null) {
                $stack->push($current);
                $current = $current->left;
            }
            $current = $stack->pop();
            $arReturn[] = $current->val;
            $current = $current->right;

        }

        return $arReturn;
    }

}
