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
    function removeZeroSumSublists($head) 
    {
        $front = new ListNode(0, $head);
        $start =  $front;

        while ($start) {
            $prefixSum = 0;
            $end = $start->next;

            while ($end) {
                $prefixSum += $end->val;
                if ($prefixSum == 0) {
                    $start->next = $end->next;
                }
                $end = $end->next;
            }

            $start = $start->next;
        }
        return  $front->next;
    }
}

