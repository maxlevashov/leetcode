function findMaxConsecutiveOnes(nums: number[]): number {
    let maxCount = 0;
    let tempCount = 0;
        
    nums.forEach(num => {
        if (num == 0) {
            maxCount = Math.max(maxCount, tempCount);
            tempCount = 0;
        } else {
            tempCount++;
        }
    });
    maxCount = Math.max(maxCount, tempCount);
    
    return maxCount;
};
