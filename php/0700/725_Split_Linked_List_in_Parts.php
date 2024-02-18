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
     * @return ListNode[]
     */
    function splitListToParts($head, $k) 
    {
        $current = $head;
        $count = 0;
        while ($current) {
            $current = $current->next;
            $count++;
        }

        $width = intval($count / $k);
        $rem = $count % $k;

        $result = [];
        $current = $head;
        for ($i = 0; $i < $k; ++$i) {
            $headCurrent = new ListNode(0);
            $write = $headCurrent;
            for ($j = 0; $j < $width + ($i < $rem ? 1 : 0); ++$j) {
                $write = $write->next = new ListNode($current->val);
                if ($current) {
                    $current = $current->next;
                }
            }
            $result[$i] = $headCurrent->next;
        }
        return $result;
    }
}

