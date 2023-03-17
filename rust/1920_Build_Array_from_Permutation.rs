impl Solution {
    pub fn build_array(nums: Vec<i32>) -> Vec<i32> {
        let mut permutation: Vec<i32> = Vec::new();
        for i in 0..nums.len() {
            permutation.push(nums[nums[i] as usize]);
        }
        return permutation;
    }
}
