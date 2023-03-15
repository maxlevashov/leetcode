/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     val: number
 *     left: TreeNode | null
 *     right: TreeNode | null
 *     constructor(val?: number, left?: TreeNode | null, right?: TreeNode | null) {
 *         this.val = (val===undefined ? 0 : val)
 *         this.left = (left===undefined ? null : left)
 *         this.right = (right===undefined ? null : right)
 *     }
 * }
 */

function isCompleteTree(root: TreeNode | null): boolean {
    let end = false;
    let queue = [root];

    while (queue.length) {
        let node = queue.shift();
        
        if (node == null) {
            end = true;
        } else {
            if (end) {
                return false;
            }

            queue.push(node.left);
            queue.push(node.right);
        }
    }

    return true;
};

