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

    protected $list = null;
    protected $listCount = 0;

    /**
     * @param ListNode $head
     */
    function __construct($head)
    {
        $this->list = $head;
        while ($head->next != null) {
            $this->listCount++;
            $head = $head->next;
        }
    }

    /**
     * @return Integer
     */
    function getRandom()
    {
        $randNumber = rand(0, $this->listCount);
        $dummy = new ListNode();
        $dummy->next = $this->list;
        while ($randNumber--) {
            $dummy = $dummy->next;
        }

        return $dummy->next->val;
    }

}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($head);
 * $ret_1 = $obj->getRandom();
 */

