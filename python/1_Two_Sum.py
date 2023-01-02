class Solution(object):
    def twoSum(self, nums, target):
        num_map = {}
        for i, num in enumerate(nums):
            if target - num in num_map:
                return [num_map[target - num], i]
            else:
                num_map[nums[i]] = i
        return [-1, -1]
