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

    private $inorderNodes = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function getMinimumDifference($root) 
    {
        $this->inorderTraversal($root);

        $minDifference = PHP_INT_MAX;

        for ($i = 1; $i < count($this->inorderNodes); $i++) {
            $minDifference = min(
                $minDifference, 
                $this->inorderNodes[$i] - $this->inorderNodes[$i - 1]
            );
        }

        return $minDifference;
    }

    protected function inorderTraversal(?TreeNode $node) 
    {
        if ($node == NULL) {
            return;
        }

        $this->inorderTraversal($node->left);
        $this->inorderNodes[] = $node->val;
        $this->inorderTraversal($node->right);
    }
}

