<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        $slow = $head;
        $fast = $head;

        while ($fast->next != null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow == $fast) {
                $slow = $head;
                while ($slow != $fast) {
                    $fast = $fast->next;
                    $slow = $slow->next;
                }
                return $slow;
            }
        }

        return null;
    }
}

