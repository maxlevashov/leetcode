func duplicateZeros(arr []int)  {
    for i := 0; i < len(arr); i++ {
        if arr[i] == 0 { 
            for j := len(arr) - 2; j > i; j-- {
                arr[j + 1] = arr[j]
            }
            i++
            if i < len(arr) {
                arr[i] = 0
            }
        }
    }
}
