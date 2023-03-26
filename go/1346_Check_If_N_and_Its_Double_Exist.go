func checkIfExist(arr []int) bool {
    set := make(map[int]bool) 
    for _, num := range arr {
        if set[num * 2] || (num % 2 == 0 && set[num / 2]) {
            return true;
        }

        set[num] = true;;
    }

    return false;
}
