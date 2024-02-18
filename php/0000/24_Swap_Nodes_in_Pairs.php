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
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        $temp = new ListNode(0);
        $temp->next = $head;
        $current = $temp;
        while ($current->next != null && $current->next->next != null) {
            $slow = $current->next;
            $fast = $current->next->next;
            $slow->next = $fast->next;
            $current->next = $fast;
            $current->next->next = $slow;
            $current = $current->next->next;
        }

        return $temp->next;
    }

}
