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

    protected $map = [];
    protected $result = [];

    /**
     * @param TreeNode $root
     * @return TreeNode[]
     */
    function findDuplicateSubtrees($root)
    {

        $this->traversal($root);

        return $this->result;
    }

    protected function traversal($root)
    {
        if ($root === null) {
            return '';
        }

        $left = $this->traversal($root->left);
        $right = $this->traversal($root->right);
        $current = $root->val . '_' . $left . '_' . $right;
        $this->map[$current] = isset($this->map[$current]) 
                ? $this->map[$current] + 1 
                : 1;
        if ($this->map[$current] == 2) {
            $this->result[] = $root;
        }

        return $current;
    }

}
