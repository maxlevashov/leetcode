class Solution(object):
    def numIslands(self, grid):
        count = 0
        for i in range(0, len(grid)):
            for j in range(0, len(grid[i])):
                if (grid[i][j] == '1'):
                    count += 1
                    self.BFS(grid, i, j)
        return count

    def BFS(self, grid, i, j):
        if (
            i < 0
            or i >= len(grid)
            or j < 0
            or j >= len(grid[i])
            or grid[i][j] == "0"
        ):
            return
        grid[i][j] = "0"
        self.BFS(grid, i + 1, j)
        self.BFS(grid, i - 1, j)
        self.BFS(grid, i, j + 1)
        self.BFS(grid, i, j - 1)    