func new21Game(n int, k int, maxPts int) float64 {
    if k == 0 {
        return 1.0
    }
    if n >= k - 1 + maxPts {
        return 1.0
    }
    var dp = make([]float64, n + 1)
  
    var probability = 0.0
    var windowSum = 1.0
    dp[0] = 1.0

    for i := 1; i <= n; i++ {
        dp[i] = windowSum / float64(maxPts)

        if i < k {
            windowSum += dp[i]
        } else {
            probability += dp[i]
        }
        
        if i >= maxPts {
            windowSum -= dp[i - maxPts]
        }
    }

    return probability
}
