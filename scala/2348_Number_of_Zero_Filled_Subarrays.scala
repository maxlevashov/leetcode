object Solution {
    def zeroFilledSubarray(nums: Array[Int]): Long = {
        var total: Long = 0;
        var current: Long = 0;
        for (i <- 0 to (nums.length - 1)) {
            if (nums(i) == 0) {
                current += 1;
                total += current;
            } else {
                current = 0;
            }
        }
        return total;
    }
}
