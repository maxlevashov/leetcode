class Solution(object):
    def maximumWealth(self, accounts):
        maxSum = 0
        tempSum = 0
        for account in accounts:
            for price in account:
                tempSum += price
            maxSum = max(maxSum, tempSum)
            tempSum = 0
        return maxSum
