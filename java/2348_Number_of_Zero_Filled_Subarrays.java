class Solution {
    public long zeroFilledSubarray(int[] nums) {
        long totalSubarrays = 0;
        long currentSubarrays = 0;
        for (int num : nums) {
            if (num == 0) {
                currentSubarrays++;
                totalSubarrays += currentSubarrays;
            } else {
                currentSubarrays = 0;
            }
        }

        return totalSubarrays;
    }
}
