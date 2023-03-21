public class Solution {
    public long ZeroFilledSubarray(int[] nums) {
        long totalZeroSubarrays = 0;
        long currentZeroSubarrays = 0;
                
        for (int i = 0; i < nums.Length; ++i) {
            if (nums[i] == 0) {
                currentZeroSubarrays++;
                totalZeroSubarrays += currentZeroSubarrays;
            } else {
                currentZeroSubarrays = 0;
            }
        }  
           
        return totalZeroSubarrays;
    }
}
