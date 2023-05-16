/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func swapPairs(head *ListNode) *ListNode {
    temp := new (ListNode);
    temp.Next = head;
    current := temp;
    for current.Next != nil && current.Next.Next != nil {
        slow := current.Next;
        fast := current.Next.Next;
        slow.Next = fast.Next;
        current.Next = fast;
        current.Next.Next = slow;
        current = current.Next.Next;
    }

    return temp.Next;
}
