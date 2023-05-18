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
     * @return Integer
     */
    function pairSum($head) 
    {
        $slow = $head;
        $fast = $head;
        $maxVal = 0;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $nextNode = new ListNode();
        $prev = null;
        while ($slow) {
            $nextNode = $slow->next;
            $slow->next = $prev;
            $prev = $slow;
            $slow = $nextNode;
        }

        while ($prev) {
            $maxVal = max($maxVal, $head->val + $prev->val);
            $prev = $prev->next;
            $head = $head->next;
        }

        return $maxVal;
    }
}
