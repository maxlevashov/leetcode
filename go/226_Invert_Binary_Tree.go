/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func invertTree(root *TreeNode) *TreeNode {
    if (root == nil) {
        return root
    }
    var left = invertTree(root.Left)
    var right = invertTree(root.Right)
    root.Right = left
    root.Left = right
    return root
}
