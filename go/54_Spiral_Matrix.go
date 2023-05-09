func spiralOrder(matrix [][]int) []int {
    var result []int
    if len(matrix) == 0 {
        return result
    }

    var rowStart = 0
    var rowEnd = len(matrix) -  1
    var columnStart = 0
    var columnEnd = len(matrix[0]) - 1

    for rowStart <= rowEnd && columnStart <= columnEnd {
        for i := columnStart; i <= columnEnd; i++ {
            result = append(result, matrix[rowStart][i]);
        }
        rowStart++;
        for i := rowStart; i <= rowEnd; i++ {
            result = append(result, matrix[i][columnEnd]);
        }
        columnEnd--;
        if rowStart <= rowEnd {
            for i := columnEnd; i >= columnStart; i-- {
                result = append(result, matrix[rowEnd][i]);
            }
        }
        rowEnd--;
        if columnStart <= columnEnd {
            for i := rowEnd; i >= rowStart; i-- {
                result = append(result, matrix[i][columnStart]);
            }
        }
        columnStart++;
    }

    return result;
}