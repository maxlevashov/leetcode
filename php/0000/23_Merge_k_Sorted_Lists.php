<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $nodes = [];
        $head = $point = new ListNode(0);
        foreach ($lists as $list) {
            while ($list != null) {
                $nodes[] = $list->val;
                $list = $list->next;
            }
        }

        sort($nodes);
        foreach ($nodes as $node) {
            $point->next = new ListNode($node);
            $point = $point->next;
        }

        return $head->next;
    }

}
