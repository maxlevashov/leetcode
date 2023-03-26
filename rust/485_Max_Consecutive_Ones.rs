use std::cmp;

impl Solution {
    pub fn find_max_consecutive_ones(nums: Vec<i32>) -> i32 {
        let mut maxCount: i32 = 0;
        let mut tempCount: i32 = 0;
        for num in nums {
            if (num == 0) {
                maxCount = cmp::max(maxCount, tempCount);
                tempCount = 0;
            } else {
                tempCount += 1;
            }
        }
        maxCount = cmp::max(maxCount, tempCount);

        return maxCount;
    }
}
