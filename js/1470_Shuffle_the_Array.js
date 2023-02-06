/**
 * @param {number[]} nums
 * @param {number} n
 * @return {number[]}
 */
var shuffle = function(nums, n) {
    let result = [];

    for (let i = 0; i < n; i++) {   
        result[2 * i] = nums[i];
        result[2 * i + 1] = nums[i + n]
    }
    
    return result;
};

