<?php

class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        $middle = $head;
        $end = $head;
        while ($end != null && $end->next != null) {
            $middle = $middle->next;
            $end = $end->next->next;
        }

        return $middle;
    }

}
