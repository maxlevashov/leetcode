/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number}
 */
var searchInsert = function(nums, target) {
    let left = 0;
    let right = nums.length;
    let mid = 0;
    while (left < right) {
        mid = parseInt((left + right) / 2);
        
        if (nums[mid] === target) {
            return mid;
        }
        if (nums[mid] > target) {
            right = mid; 
        } else {
            left = mid + 1;
        }
    }

    return nums[mid] < target ? mid + 1 : mid;
};


