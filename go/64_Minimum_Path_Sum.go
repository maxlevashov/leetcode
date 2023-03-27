func minPathSum(grid [][]int) int {
    var height = len(grid)
    var width = len(grid[0])
    var dp [200][200]int
    dp[0][0] = grid[0][0]

    for i := 1; i < height; i++ {
        dp[i][0] = dp[i - 1][0] + grid[i][0]
    }
    for j := 1; j < width; j++ {
        dp[0][j] = dp[0][j - 1] + grid[0][j]
    }
    for i := 1; i < height; i++ {
        for j := 1; j < width; j++ {
            dp[i][j] = min(dp[i - 1][j], dp[i][j - 1]) + grid[i][j]
        }
    }

    return dp[height - 1][width - 1]
}

func min(a, b int) int {
    if a < b {
        return a
    }
    return b
}
