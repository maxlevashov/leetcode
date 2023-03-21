impl Solution {
    pub fn zero_filled_subarray(nums: Vec<i32>) -> i64 {
        let mut current: i64 = 0;
        let mut total: i64 = 0;
        for i in 0..nums.len() as usize {
            if (nums[i] == 0) {
                current += 1;
                total += current;
            } else {
                current = 0;
            }
        }  
        return total;
    }
}
