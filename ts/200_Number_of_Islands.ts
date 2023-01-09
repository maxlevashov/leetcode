function numIslands(grid: string[][]): number {
    let count = 0;
    for (let i = 0; i < grid.length; i++) {
        for (let j = 0; j < grid[i].length; j++) {
            if (grid[i][j] == '1') {
                count++;
                BFS(grid, i, j);
            }
        }
    }
    return count;
};

function BFS(grid: string[][], i: number, j: number) {
    if (
        i < 0 || i >= grid.length
        || j < 0 || j >= grid[i].length
        || grid[i][j] == "0"
    ) {
        return;
    }

    grid[i][j] = "0";
    BFS(grid, i + 1, j);
    BFS(grid, i - 1, j);
    BFS(grid, i, j + 1);
    BFS(grid, i, j - 1);
}

