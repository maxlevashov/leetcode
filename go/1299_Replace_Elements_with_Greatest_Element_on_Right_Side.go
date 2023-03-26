func replaceElements(arr []int) []int {
    var greatest = -1;
        
    for i := len(arr) - 1; i >= 0; i-- {
        var temp = arr[i];
        arr[i] = greatest;
        greatest = max(greatest, temp);
    }
    
    return arr;
}

func max(x, y int) int {
	if x < y {
		return y
	}
	return x
}
