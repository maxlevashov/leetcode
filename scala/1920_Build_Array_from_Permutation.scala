object Solution {
    def buildArray(nums: Array[Int]): Array[Int] = {
        var result = new Array[Int](nums.length)
        for (i <- 0 to (nums.length - 1)) {
            result(i) = nums(nums(i))
        }
        return result
    }
}
