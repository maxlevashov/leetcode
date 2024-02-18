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
     * @return TreeNode
     */
    function pruneTree($root)
    {
        if ($root === null) {
            return $root;
        }

        if (!$this->containsOne($root)) {
            $root->val = null;
        }

        return $root;
    }

    protected function containsOne(&$node)
    {
        if ($node === null) {
            return false;
        }
        $isLeftContains = $this->containsOne($node->left);
        $isRightContains = $this->containsOne($node->right);
        if (!$isLeftContains) {
            $node->left = null;
        }
        if (!$isRightContains) {
            $node->right = null;
        }

        return $node->val == 1 || $isLeftContains || $isRightContains;
    }

}
