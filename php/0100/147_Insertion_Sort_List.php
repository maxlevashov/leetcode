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
    function insertionSortList($head) 
    {
        $dummy = new ListNode();
        $curr = $head;

        while ($curr != null) {
            $prev = $dummy;

            while (
                $prev->next
                && $prev->next->val <= $curr->val
            ) {
                $prev = $prev->next;
            }

            $next = $curr->next;
            $curr->next = $prev->next;
            $prev->next = $curr;

            $curr = $next;
        }

        return $dummy->next;
    }
}

