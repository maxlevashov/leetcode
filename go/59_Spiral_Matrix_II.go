func generateMatrix(n int) [][]int {
    var result = make([][]int, n)
    var rowBegin = 0
    var rowEnd = n - 1
    var columnBegin = 0
    var columnEnd = n - 1
    var counter = 1

    for i := range result {
        result[i] = make([]int, n)          
    }  

    for rowBegin <= rowEnd && columnBegin <= columnEnd {
        for i := columnBegin; i <= columnEnd; i++ {
            result[rowBegin][i] = counter
            counter++
        }           
        rowBegin++

        for i := rowBegin; i <= rowEnd; i++ {
            result[i][columnEnd] = counter
            counter++
        }
        columnEnd--;

        if rowBegin <= rowEnd {
            for i := columnEnd; i >= columnBegin; i-- {
                result[rowEnd][i] = counter
                counter++
            }
        }
        rowEnd--

        if columnBegin <= columnEnd {
            for i := rowEnd; i >= rowBegin; i-- {
                result[i][columnBegin] = counter
                counter++
            }
        }
        columnBegin++
    }

    
    return result
}
