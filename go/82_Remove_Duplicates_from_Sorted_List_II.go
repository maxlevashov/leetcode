/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func deleteDuplicates(head *ListNode) *ListNode {
    dummy := new(ListNode);
    dummy.Next = head;
    prev := dummy;
    current := head;
    for current != nil {
        for current.Next != nil && current.Val == current.Next.Val {
            current = current.Next;
        }
        if prev.Next == current {
            prev = prev.Next;
        } else {
            prev.Next = current.Next;
        }
        current = current.Next;
    }

    return dummy.Next;
}


