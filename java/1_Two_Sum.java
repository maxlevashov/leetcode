class Solution {
    public int[] twoSum(int[] nums, int target) {
        HashMap<Integer, Integer> numsSwap = new HashMap<Integer, Integer>();
        int[] result = {-1, -1};
        for (int i = 0; i < nums.length; ++i) {
            if (numsSwap.containsKey(target - nums[i])) {
                result[0] = i;
                result[1] = numsSwap.get(target - nums[i]);
            } else {
                numsSwap.put(nums[i], i);
            }
        }

        return result;
    }
}