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
     * @return Boolean
     */
    function isPalindrome($head)
    {
        $fast = $head;
        $slow = $head;

        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        $slow = $this->reversed($slow);
        $fast = $head;

        while ($slow != null) {
            if ($slow->val != $fast->val) {
                return false;
            }
            $slow = $slow->next;
            $fast = $fast->next;
        }

        return true;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    protected function reversed($head)
    {
        $prev = null;
        while ($head != null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }

        return $prev;
    }

}
