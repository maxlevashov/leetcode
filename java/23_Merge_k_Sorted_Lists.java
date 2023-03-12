/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode() {}
 *     ListNode(int val) { this.val = val; }
 *     ListNode(int val, ListNode next) { this.val = val; this.next = next; }
 * }
 */
class Solution {
    public ListNode mergeKLists(ListNode[] lists) {
        ArrayList<Integer> nodes = new ArrayList<Integer>();
        ListNode head = new ListNode(0);
        ListNode point = head;
        for (ListNode list : lists) {
            while (list != null) {
                nodes.add(list.val);
                list = list.next;
            }
        }

        Collections.sort(nodes);   
        for (int node: nodes) {
            point.next = new ListNode(node);
            point = point.next;
        }
        
        return head.next;
    }
}

