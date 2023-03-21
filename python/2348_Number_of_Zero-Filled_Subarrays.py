class Solution:
    def zeroFilledSubarray(self, nums: List[int]) -> int:
        total = current = 0
        for _, num in enumerate(nums):
            if num == 0:
                current += 1
                total += current
            else:
                current = 0
        return total
