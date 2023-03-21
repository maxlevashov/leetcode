/**
 * @param {number[]} nums
 * @return {number}
 */
var zeroFilledSubarray = function(nums) {
    let totalSubarrays = 0;
    let currentSubarrays = 0;
    nums.forEach((num) => {
        if (num == 0) {
            currentSubarrays++;
            totalSubarrays += currentSubarrays;
        } else {
            currentSubarrays = 0;
        }
    });

    return totalSubarrays;
};


