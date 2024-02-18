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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) 
    {
        $s1 = new SplStack();
        $s2 = new SplStack();

        while ($l1) {
            $s1->push($l1->val);
            $l1 = $l1->next;
        }

        while ($l2) {
            $s2->push($l2->val);
            $l2 = $l2->next;
        }

        $totalSum = 0;
        $carry = 0;
        $ans = new ListNode();
        while (!$s1->isEmpty() || !$s2->isEmpty()) {
            if (!$s1->isEmpty()) {
                $totalSum += $s1->pop();
            }
            if (!$s2->isEmpty()) {
                $totalSum += $s2->pop();
            }

            $ans->val = $totalSum % 10;
            $carry = intval($totalSum / 10);
            $newNode = new ListNode($carry);
            $newNode->next = $ans;
            $ans = $newNode;
            $totalSum = $carry;
        }

        return $carry == 0 ? $ans->next : $ans;
    }
}

