class Solution {
public:
    int findMaxConsecutiveOnes(vector<int>& nums) {
        int maxCount = 0;
        int tempCount = 0;
        
        for (int num : nums) {
            if (num == 0) {
                maxCount = max(maxCount, tempCount);
                tempCount = 0;
            } else {
                tempCount++;
            }
        }
        maxCount = max(maxCount, tempCount);
        
        return maxCount;
    }
};
