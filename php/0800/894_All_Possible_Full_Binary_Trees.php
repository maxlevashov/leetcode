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
     * @param Integer $n
     * @return TreeNode[]
     */
    function allPossibleFBT($n) 
    {
        if ($n % 2 == 0) {
            return [];
        }

        $dp = [];

        $dp[1][] = new TreeNode(0);
        for ($count = 3; $count <= $n; $count += 2) {
            for ($i = 1; $i < $count - 1; $i += 2) {
                $j = $count - 1 - $i;
                foreach ($dp[$i] as $left) {
                    foreach ($dp[$j] as $right) {
                        $root = new TreeNode(0, $left, $right);
                        $dp[$count][] = $root;
                    }
                }
            }
        }
        
        return $dp[$n];
    }
}

