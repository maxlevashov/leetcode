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

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head)
    {
        if ($head == null) {
            return null;
        }
        if ($head->next == null) {
            return new TreeNode($head->val);
        }
        $slow = $head;
        $fast = $head->next->next;
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $bst = new TreeNode($slow->next->val);
        $righthalf = $slow->next->next;
        $slow->next = null;
        $bst->left = $this->sortedListToBST($head);
        $bst->right = $this->sortedListToBST($righthalf);

        return $bst;
    }

}
