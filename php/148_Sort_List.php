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
    function sortList($head) {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $mid = $this->getMid($head);
        $left = $this->sortList($head);
        $right = $this->sortList($mid);
        
        return $this->merge($left, $right);
    }

    protected function merge($list1, $list2) {
        $dummyHead = new ListNode();
        $tail = $dummyHead;

        while ($list1 !== null && $list2 !== null) {
            if ($list1->val < $list2->val) {
                $tail->next = $list1;
                $list1 = $list1->next;
                $tail = $tail->next;
            } else {
                $tail->next = $list2;
                $list2 = $list2->next;
                $tail = $tail->next;
            }
        }
        $tail->next = $list1 !== null ? $list1 : $list2;

        return $dummyHead->next;
    }

    protected function getMid($head) {
        $midPrev = null;

        while ($head !== null && $head->next !== null) {
            $midPrev = $midPrev === null ? $head : $midPrev->next;
            $head = $head->next->next;
        }
        $mid = $midPrev->next;
        if (!empty($midPrev->next)) {
            $midPrev->next = null;
        }

        return $mid;
    }
}
