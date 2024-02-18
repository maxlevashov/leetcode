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
    function mergeNodes($head)
    {
        $head = $head->next;
        $start = $head;
        while ($start) {
            $end = $start;
            $sum = 0;
            while ($end->val != 0) {
                $sum += $end->val;
                $end = $end->next;
            }
            $start->val = $sum;
            $start->next = $end->next;
            $start = $start->next;
        }
        return $head;
    }

}
