impl Solution {
    pub fn get_concatenation(nums: Vec<i32>) -> Vec<i32> {
        let mut concat: Vec<i32> = Vec::new();
        let mut k: usize = 0;
        for i in 0..(2 * nums.len()) {
            if (i < nums.len()) {
                k = i;
            } else {
                k = i - nums.len();
            }
            concat.push(nums[k]);
        }  
        return concat;
    }
}
