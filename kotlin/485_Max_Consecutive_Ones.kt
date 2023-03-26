import kotlin.math.max

class Solution {
    fun findMaxConsecutiveOnes(nums: IntArray): Int {
        var maxCount = 0;
        var tempCount = 0;
            
        for (num in nums) {
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
}
