func numIslands(grid [][]byte) int {
    var count int;
    for i:= 0; i < len(grid); i++ {
        for j:= 0; j < len(grid[i]); j++ {
            if (grid[i][j] == '1') {
                count++;
                BFS(grid, i, j);
            }
        }
    }
    return count;
}

func BFS(grid [][]byte, i int, j int) {
    if i < 0 || i >= len(grid) || j < 0 || j >= len(grid[i]) || grid[i][j] == '0' {
         return;
    }

    grid[i][j] = '0';
    BFS(grid, i + 1, j);
    BFS(grid, i - 1, j);
    BFS(grid, i, j + 1);
    BFS(grid, i, j - 1);
}