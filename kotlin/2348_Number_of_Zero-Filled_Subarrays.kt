class Solution {
    fun zeroFilledSubarray(nums: IntArray): Long {
        var totalSubarrays: Long = 0;
        var currentSubarrays: Long = 0;
        for (i in 0 until nums.size) {
            if (nums[i] == 0) {
                currentSubarrays++;
                totalSubarrays += currentSubarrays;
            } else {
                currentSubarrays = 0;
            }
        }
        return totalSubarrays;
    }
}
