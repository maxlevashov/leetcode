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

    protected $inorderNodes = [];

    /**
     * @param TreeNode $root
     * 
     */
    protected function inorderTraversal($root)
    {
        if ($root == null) {
            return;
        }

        $this->inorderTraversal($root->left);
        $this->inorderNodes[] = $root->val;
        $this->inorderTraversal($root->right);
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    public function minDiffInBST($root)
    {
        $this->inorderTraversal($root);

        $minDistance = PHP_INT_MAX;

        for ($i = 1; $i < count($this->inorderNodes); $i++) {
            $minDistance = min(
                $minDistance,
                $this->inorderNodes[$i] - $this->inorderNodes[$i - 1]
            );
        }

        return $minDistance;
    }

}
