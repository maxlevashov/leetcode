class Solution {
public:
    long long zeroFilledSubarray(vector<int>& nums) {
        long long totalZeroSubarrays = 0;
        long long currentZeroSubarrays = 0;
                
        for (int i = 0; i < nums.size(); ++i) {
            if (nums[i] == 0) {
                currentZeroSubarrays++;
                totalZeroSubarrays += currentZeroSubarrays;
            } else {
                currentZeroSubarrays = 0;
            }
        }  
           
        return totalZeroSubarrays;
    }
};
