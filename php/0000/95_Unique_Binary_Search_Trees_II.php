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

    protected function traverse($start, $end) 
    {
        $tree = [];
        if ($start > $end) {
            $tree[] = null;
            return $tree;
        }
        for ($i = $start; $i <= $end; $i++) {
            $left = $this->traverse($start, $i - 1);
            $right = $this->traverse($i + 1, $end);
            foreach ($left as $leftItem) {
                foreach ($right as $rightItem) {
                    $node = new TreeNode($i, $leftItem, $rightItem);
                    $tree[] = $node;
                }
            }
        }
        return $tree;
    }
    
    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function generateTrees($n) {
        if ($n == 0) {
            return [];
        }
        
        return $this->traverse(1, $n);
    }
}

