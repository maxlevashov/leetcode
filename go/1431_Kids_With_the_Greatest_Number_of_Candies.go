func kidsWithCandies(candies []int, extraCandies int) []bool {
    var candiesMax = max(candies)
    var result []bool

    for _, candy := range candies {
        result = append(result, candy + extraCandies >= candiesMax)
    }

    return result
}

func max(candies []int) int {
    var max = 0

    for _, candy := range candies {
        if max < candy {
            max = candy
        }
    }
    
    return max
}
