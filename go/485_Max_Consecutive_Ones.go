func findMaxConsecutiveOnes(nums []int) int {
    var maxCount int
    var tempCount int
        
    for _, num := range nums {
        if (num == 0) {
            maxCount = max(maxCount, tempCount);
            tempCount = 0
        } else {
            tempCount++
        }
    }
    maxCount = max(maxCount, tempCount);
    
    return maxCount
}

func max(a, b int) int {
    if a > b {
        return a
    }
    return b
}
