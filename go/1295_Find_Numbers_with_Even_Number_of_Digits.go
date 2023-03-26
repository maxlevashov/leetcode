func findNumbers(nums []int) int {
    var countEven = 0
    
    for _, num := range nums  {
        var currentCountDigits = 0
        for num != 0 {
            num = num / 10;
            currentCountDigits++
        }
        if (currentCountDigits % 2 == 0) {
            countEven++
        }
    }
    
    return countEven
}
