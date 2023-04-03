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
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    function reverseBetween($head, $left, $right) 
    {
        if ($head == null) {
            return null;
        }
        
        $dummy = new ListNode(0); 
        $dummy->next = $head;
        $pre = $dummy; 
        for ($i = 0; $i < $left - 1; $i++) { 
            $pre = $pre->next;
        }
        
        $start = $pre->next; 
        $then = $start->next; 
        
        for($i = 0; $i < $right - $left; $i++) {
            $start->next = $then->next;
            $then->next = $pre->next;
            $pre->next = $then;
            $then = $start->next;
        }
        
        return $dummy->next;
    }
}

