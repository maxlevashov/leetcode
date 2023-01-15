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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2)
    {
        $tempNode = new ListNode(0);
        $currentNode = $tempNode;
        while ($list1 !== null && $list2 !== null) {
            if ($list1->val < $list2->val) {
                $currentNode->next = $list1;
                $list1 = $list1->next;
            } else {
                $currentNode->next = $list2;
                $list2 = $list2->next;
            }
            $currentNode = $currentNode->next;
        }
        if ($list1 !== null) {
            $currentNode->next = $list1;
            $list1 = $list1->next;
        }
        if ($list2 !== null) {
            $currentNode->next = $list2;
            $list2 = $list2->next;
        }
        return $tempNode->next;
    }

}
