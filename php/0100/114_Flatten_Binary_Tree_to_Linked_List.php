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
     * @return NULL
     */
    function flatten($root)
    {
        if ($root == null) {
            return;
        }
        $arStack = [$root];
        while (!empty($arStack)) {
            $node = array_pop($arStack);
            if ($node->right !== null) {
                $arStack[] = $node->right;
            }
            if ($node->left !== null) {
                $arStack[] = $node->left;
            }
            if (!empty($arStack)) {
                $node->right = $arStack[array_key_last($arStack)];
            }
            $node->left = null;
        }
    }

}
