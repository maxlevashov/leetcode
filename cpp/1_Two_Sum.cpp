class Solution {
public:
    vector<int> twoSum(vector<int>& nums, int target) {
        unordered_map<int, int> numMap;
        vector<int> result;
        for (int i = 0; i < nums.size(); ++i) {
            if (numMap.find(target - nums[i]) != numMap.end()) {
                result = {numMap[target - nums[i]], i};
            } else {
                numMap[nums[i]] = i;
            }
        }

        return result;
    }
};