<?php

/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */
class Solution
{

    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root)
    {
        if ($root == null) {
            return [];
        }
        $arStack = [$root];
        $arReturn = [];

        while (!empty($arStack)) {
            $node = array_pop($arStack);
            $arReturn[] = $node->val;
            $arTemp = array_reverse($node->children);

            foreach ($arTemp as $child) {
                $arStack[] = $child;
            }
        }

        return $arReturn;
    }

}
