class Solution {
public:
    int maximumWealth(vector<vector<int>>& accounts) {
        int maxSum = 0;
        int tempSum = 0;
        for (vector<int> account : accounts) {
            for (int price : account) {
                cout << price;
                tempSum += price;
            }
            maxSum = max(maxSum, tempSum);
            tempSum = 0;
        }

        return maxSum;
    }
};