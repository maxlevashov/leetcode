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
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if (empty($head)) {
            return $head;
        }

        $previous = null;
        $current = $head;
        $next = null;
        while (!empty($current)) {
            $next = $current->next; 
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }
            
        return $previous;
    }
}
