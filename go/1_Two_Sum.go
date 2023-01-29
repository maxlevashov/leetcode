func twoSum(nums []int, target int) []int {
    numsSwap := make(map[int]int)
    var result []int
    for i:= 0; i < len(nums); i++ {
        if numsSwap[target - nums[i]] != 0 {
            result = append(result, numsSwap[target - nums[i]] - 1)
	        result = append(result, i)
        } else {
            numsSwap[nums[i]] = i + 1
        }
    }
    
    return result;
}

