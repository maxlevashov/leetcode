/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func addTwoNumbers(l1 *ListNode, l2 *ListNode) *ListNode {
    dummyHead := new(ListNode)
    curr := dummyHead
    carry := 0
    for l1 != nil || l2 != nil || carry != 0 {
        var x int
        var y int
        if l1 != nil {
            x = l1.Val
            l1 = l1.Next
        } 
        if l2 != nil {
            y = l2.Val
            l2 = l2.Next
        } 

        sum := carry + x + y
        carry = sum / 10

        curr.Next = &ListNode{sum % 10, nil}
        curr = curr.Next
    }

    return dummyHead.Next;
}

