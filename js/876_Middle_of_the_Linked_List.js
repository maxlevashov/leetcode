/**
 * @param {ListNode} head
 * @return {ListNode}
 */
var middleNode = function(head) {
    let middle = head;
    let end = head;
    while (end !== null && end.next !== null) {
        middle = middle.next;
        end = end.next.next;
    }
    return middle;
};