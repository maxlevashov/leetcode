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
    function rotateRight($head, $k) 
    {
        if ($head == null) {
            return $head;
        }
            
        $current = $head;
        $length = 1;
        while ($current->next) {
            $current = $current->next;
            $length += 1; 
        }
        $current->next = $head;

        $k = $length - ($k % $length);
        while ($k > 0) {
            $current = $current->next;
            $k -= 1;
        }
        $newHead = $current->next;
        $current->next = null;

        return $newHead;
    }
}

