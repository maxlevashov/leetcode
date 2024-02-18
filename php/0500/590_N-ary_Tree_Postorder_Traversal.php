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
    function postorder($root)
    {
        if ($root == null) {
            return [];
        }

        $arReturn = [];
        $nodeStack = [$root];

        while (count($nodeStack) > 0) {
            $mynode = $nodeStack[count($nodeStack) - 1];
            array_unshift($arReturn, $mynode->val);
            array_pop($nodeStack);
            foreach ($mynode->children as $child) {
                $nodeStack[] = $child;
            }
        }
        
        return $arReturn;
    }

}
