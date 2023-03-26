func validMountainArray(arr []int) bool {
    if (len(arr) < 3) {
        return false;
    }
    var left = 0;
    var right = len(arr) - 1;
    for left + 1 < len(arr) - 1 && arr[left] < arr[left + 1] {
        left++;
    }
    for right - 1 > 0 && arr[right] < arr[right - 1] {
        right--;
    }
    
    return left == right;
}
