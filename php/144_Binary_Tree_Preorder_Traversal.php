<?php


class Solution
{
    /** iteratively */
    function preorderTraversal($root)
    {
        if ($root == null) {
            return [];
        }

        $arReturn = [];
        $nodeStack = [$root];

        while (count($nodeStack) > 0) {
            $mynode = $nodeStack[count($nodeStack) - 1];
            $arReturn[] = $mynode->val;
            array_pop($nodeStack);
            if ($mynode->right != null) {
                $nodeStack[] = $mynode->right;
            }
            if ($mynode->left != null) {
                $nodeStack[] = $mynode->left;
            }
        }
        return $arReturn;
    }

}
