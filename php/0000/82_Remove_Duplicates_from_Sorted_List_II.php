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
        $dummy = new ListNode();
        $dummy->next = $head;
        $prev = $dummy;
        $current = $head;
        
        while ($current != null) {
            while (
                $current->next != null 
                && $current->val == $current->next->val
            ){
                $current = $current->next;
            }
            if ($prev->next == $current) {
                $prev = $prev->next;
            } else {
                $prev->next = $current->next;
            }
            $current = $current->next;
        }

        return $dummy->next;
    }
}

