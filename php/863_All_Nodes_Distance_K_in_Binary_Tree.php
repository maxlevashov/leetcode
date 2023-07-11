<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution 
{

    protected $map = [];

    /**
     * @param TreeNode $root
     * @param TreeNode $target
     * @param Integer $k
     * @return Integer[]
     */
    function distanceK($root, $target, $k) 
    {
        $result = [];
        $this->find($root, $target);
        $this->dfs($root, $target, $k, $this->map[serialize($root)], $result);

        return $result;
    }

    /**
     * 
     * @param type $root
     * @param type $target
     * @return int
     */
    protected function find($root, $target) {
        if ($root == null) {
            return -1;
        }
        if ($root == $target) {
            $this->map[serialize($root)] = 0;
            return 0;
        }
        $left = $this->find($root->left, $target);
        if ($left >= 0) {
            $this->map[serialize($root)] = $left + 1;
            return $left + 1;
        }
		$right = $this->find($root->right, $target);
		if ($right >= 0) {
            $this->map[serialize($root)] = $right + 1;
            return $right + 1;
        }

        return -1;
    }
    
    /**
     * 
     * @param type $root
     * @param type $target
     * @param int $k
     * @param int $length
     * @param type $result
     * @return type
     */
    protected function dfs($root, $target, int $k, int $length, &$result) 
    {
        if ($root == null) {
            return;
        }
        if (isset($this->map[serialize($root)])) {
            $length = $this->map[serialize($root)];
        }
        if ($length == $k) { 
            $result[] = $root->val;
        }
        $this->dfs($root->left, $target, $k, $length + 1, $result);
        $this->dfs($root->right, $target, $k, $length + 1, $result);
    }
}

