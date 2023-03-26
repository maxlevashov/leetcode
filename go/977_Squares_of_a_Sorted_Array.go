func sortedSquares(nums []int) []int {
        var result []int
        var left = 0
        var right = len(nums) - 1
        for left <= right {
            if nums[left] * nums[left] > nums[right] * nums[right] {
                result = append(result, nums[left] * nums[left]);
                left++;
            } else {
                result = append(result, nums[right] * nums[right]);
                right--;
            }
        }

        return reverse(result);
}

func reverse(nums []int) []int {
    for i, j := 0, len(nums)-1; i < j; i, j = i+1, j-1 {
        nums[i], nums[j] = nums[j], nums[i]
    }
    return nums
}
