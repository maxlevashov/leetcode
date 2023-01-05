class Solution {
public:
    vector<int> runningSum(vector<int>& nums) {
        vector<int> result;
        int sum;
        for (int num : nums) {
            sum += num;
            result.push_back(sum);
        }

        return result;
    }
}