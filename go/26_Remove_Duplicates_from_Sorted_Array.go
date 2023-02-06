func removeDuplicates(nums []int) int {
    var count int;

    for i, value := range nums {
        if (nums[count] != value){
            nums[count + 1] = nums[i];
            count++;
        }
    }
    
    return count + 1;
}

