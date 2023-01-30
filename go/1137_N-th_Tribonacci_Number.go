var memo = map[int]int{
    1: 1,
    2: 1,
}

func tribonacci(n int) int {
    if (n == 0) {
        return n
    }
    if memo[n] == 0 {
        memo[n] = tribonacci(n - 1) + tribonacci(n - 2) + tribonacci(n - 3)
    }
    return memo[n]
}
