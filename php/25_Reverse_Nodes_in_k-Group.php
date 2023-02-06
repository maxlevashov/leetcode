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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k)
    {
        if ($head == null || $k == 1) {
            return $head;
        }

        $dummy = new ListNode();
        $dummy->next = $head;
        $current = $dummy;
        $next = $dummy;
        $prev = $dummy;
        $count = 0;

        while ($current->next != null) {
            $current = $current->next;
            $count++;
        }

        while ($count >= $k) {
            $current = $prev->next;
            $next = $current->next;
            for ($i = 1; $i < $k; $i++) {
                $current->next = $next->next;
                $next->next = $prev->next;
                $prev->next = $next;
                $next = $current->next;
            }
            $prev = $current;
            $count -= $k;
        }
        return $dummy->next;
    }

}
