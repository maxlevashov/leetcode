class Solution:
    def findMaxConsecutiveOnes(self, nums: List[int]) -> int:
        maxCount = 0
        tempCount = 0
            
        for num in nums:
            if (num == 0): 
                maxCount = max(maxCount, tempCount)
                tempCount = 0
            else:
                tempCount += 1
        maxCount = max(maxCount, tempCount)
        
        return maxCount
