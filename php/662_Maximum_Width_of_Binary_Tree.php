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

    protected $maxWidth = 0;
    protected $leftPosition = [0];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function widthOfBinaryTree($root)
    {

        $this->getWidth($root, 0, 0);

        return $this->maxWidth;
    }

    protected function getWidth($node, $depth, $position)
    {
        if ($node === null) {
            return;
        }

        if (!isset($this->leftPosition[$depth])) {
            $this->leftPosition[$depth] = $position;
        }
        $diff = $position - $this->leftPosition[$depth];
        $this->maxWidth = max($this->maxWidth, $diff + 1);

        $this->getWidth($node->left, $depth + 1, $diff * 2);
        $this->getWidth($node->right, $depth + 1, $diff * 2 + 1);
    }

}
