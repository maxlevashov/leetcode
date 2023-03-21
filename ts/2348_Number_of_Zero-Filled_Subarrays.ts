function zeroFilledSubarray(nums: number[]): number {
    let currentSubarrays: number = 0;
    let totalSubarrays: number = 0;
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
