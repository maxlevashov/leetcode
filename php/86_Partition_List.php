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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x)
    {
        $beforeHead = new ListNode(0);
        $before = $beforeHead;
        $afterHead = new ListNode(0);
        $after = $afterHead;

        while ($head !== null) {
            if ($head->val < $x) {
                $before->next = $head;
                $before = $before->next;
            } else {
                $after->next = $head;
                $after = $after->next;
            }
            $head = $head->next;
        }

        $after->next = null;
        $before->next = $afterHead->next;

        return $beforeHead->next;
    }

}
