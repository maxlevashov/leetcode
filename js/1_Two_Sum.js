/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(nums, target) {
    let numsSwap = {};
    let result = [-1, -1];
    nums.forEach((element, index) => {
        if (numsSwap.hasOwnProperty(target - element)) {
            result = [numsSwap[target - element], index];
        } else {
            numsSwap[element] = index;
        }
    });
    return result;
};
