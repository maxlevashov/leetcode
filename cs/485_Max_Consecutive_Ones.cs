public class Solution {
    public int FindMaxConsecutiveOnes(int[] nums) {
        int maxCount = 0;
        int tempCount = 0;
        
        foreach (int num in nums) {
            if (num == 0) {
                maxCount = Math.Max(maxCount, tempCount);
                tempCount = 0;
            } else {
                tempCount++;
            }
        }
        maxCount = Math.Max(maxCount, tempCount);
        
        return maxCount;
    }
}
