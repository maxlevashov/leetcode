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
    function swapNodes($head, $k) 
    {
        $leftNode = $head;
        $rightNode = $head;
        for ($i = 0; $i < $k - 1; $i++) {
            $rightNode = $rightNode->next;
        }
        
        $current = $rightNode;
        while ($rightNode->next) {
            $leftNode = $leftNode->next;
            $rightNode = $rightNode->next;
        }
        
        $this->swap($current->val, $leftNode->val);
        
        return $head;
    }
    
    protected function swap(&$a, &$b) {
        list($b, $a) = [$a, $b];
    }
}

