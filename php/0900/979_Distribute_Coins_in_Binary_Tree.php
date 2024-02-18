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

    protected $numMoves = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function distributeCoins($root)
    {
        $this->giveCoins($root);
        return $this->numMoves;
    }

    protected function giveCoins($node)
    {
        if ($node === null) {
            return 0;
        }
        
        $left = $this->giveCoins($node->left);
        $right = $this->giveCoins($node->right);
        $this->numMoves += abs($left) + abs($right);
        
        return $node->val + $left + $right - 1;
    }

}
