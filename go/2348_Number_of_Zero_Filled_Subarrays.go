func zeroFilledSubarray(nums []int) int64 {
    var totalSubarrays int64
    var currentSubarrays int64

    for _, value := range nums {
        if (value == 0) {
            currentSubarrays++
            totalSubarrays += currentSubarrays;
        } else {
            currentSubarrays = 0;
        }
    }

    return totalSubarrays
}
