object Solution {
    def findMaxConsecutiveOnes(nums: Array[Int]): Int = {
        var maxCount = 0;
        var tempCount = 0;
        for (num <- nums) {
            if (num == 0) {
                maxCount = maxCount.max(tempCount);
                tempCount = 0;
            } else {
                tempCount += 1;
            }
        }
        maxCount = maxCount.max(tempCount);

        return maxCount;
    }
}
