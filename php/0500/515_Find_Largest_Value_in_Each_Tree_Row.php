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
    function largestValues($root)
    {
        $arResult = [];
        $this->DFS($root, $arResult, 0);
        return $arResult;
    }
    
    
    protected function DFS($root, &$arResult, $level)
    {
        if ($root == null) {
            return;
        }
        if (!isset($arResult[$level])) {
            $arResult[] = $root->val;
        } else {
            $arResult[$level] = max($arResult[$level], $root->val);
        }
        $this->DFS($root->left, $arResult, $level + 1);
        $this->DFS($root->right, $arResult, $level + 1);
    }

}
