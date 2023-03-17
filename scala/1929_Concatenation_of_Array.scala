object Solution {
    def getConcatenation(nums: Array[Int]): Array[Int] = {
        var concatArray = new Array[Int](2 * nums.length)
        var k = 0
        for (i <- 0 to (2 * (nums.length) - 1)) {
            if (i < nums.length) {
                k = i
            } else {
                k = i - nums.length
            }
            concatArray(i) = nums(k)
        }
        return concatArray
    }
}

