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
    function deleteDuplicates($head)
    {
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $curr = $head;
        $prev = $dummy;
        while ($curr !== null) {
            if ($curr->val === $curr->next->val) {
                $prev->next = $curr->next;
            } else {
                $prev = $curr;
            }
            $curr = $curr->next;
        }

        return $dummy->next;
    }

}
