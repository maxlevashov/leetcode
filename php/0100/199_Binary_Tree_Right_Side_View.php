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
    function rightSideView($root)
    {
        $arResult = [];
        if ($root == null) {
            return $arResult;
        }
        $queue = [$root];

        while (!empty($queue)) {
            $queueSize = count($queue);
            for ($i = 0; $i < $queueSize; $i++) {
                $node = array_shift($queue);
                if ($i == 0) {
                    $arResult[] = $node->val;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
            }
        }

        return $arResult;
    }

}
