/**
 * Example:
 * var ti = TreeNode(5)
 * var v = ti.`val`
 * Definition for a binary tree node.
 * class TreeNode(var `val`: Int) {
 *     var left: TreeNode? = null
 *     var right: TreeNode? = null
 * }
 */
class Solution {
    fun invertTree(root: TreeNode?): TreeNode? {
        if (root == null) {
            return root;
        }
        var left = invertTree(root.left);
        var right = invertTree(root.right);
        root.right = left;
        root.left = right;
        return root;
    }
}