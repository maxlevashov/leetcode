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
     * @return NULL
     */
    function reorderList($head) 
    {
        if ($head == null) {
            return;
        }
        $slow = $head;
        $fast = $head;
        while ($fast->next && $fast->next->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $prev = null;
        $curr = $slow->next;
        while ($curr) {
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }    
        $slow->next = null;
        
        $head1 = $head;
        $head2 = $prev;
        while ($head2) {
            $next = $head1->next;
            $head1->next = $head2;
            $head1 = $head2;
            $head2 = $next;
        }
    }
}

