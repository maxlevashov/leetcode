class Solution {
    fun numIslands(grid: Array<CharArray>): Int {
        var count = 0;
        for (i in 0 until grid.size){
            for (j in 0 until grid[i].size){
                if (grid[i][j] == '1') {
                    count++;
                    BFS(grid, i, j);
                }
            }
        }
        
        return count;
    }

    fun BFS(grid: Array<CharArray>, i: Int, j: Int) {
        if (
            i < 0 
            || i >= grid.size
            || j < 0 
            || j >= grid[i].size
            || grid[i][j] == '0'
        ) {
            return;
        }
        
        grid[i][j] = '0';
        BFS(grid, i + 1, j);
        BFS(grid, i - 1, j);
        BFS(grid, i, j + 1);
        BFS(grid, i, j - 1);
    }
}