/**
 * Definition for a binary tree node.
 * struct TreeNode {
 *     int val;
 *     TreeNode *left;
 *     TreeNode *right;
 *     TreeNode(int x) : val(x), left(NULL), right(NULL) {}
 * };
 */

class Solution {
public:
    TreeNode* getTargetCopy(TreeNode* original, TreeNode* cloned, TreeNode* target) {
        return dfs(cloned, target->val);
    }

    TreeNode* dfs(TreeNode* current, int value) {
	if (!current) {
            return NULL;
        }

                    if (current->val == value) {
            return current;
        }
                    TreeNode* left = dfs(current->left, value);
                    if (left) {
            return left;
        }
                    TreeNode* right = dfs(current->right, value);
                    if (right) {
            return right;
        }
	return NULL;
	}
};