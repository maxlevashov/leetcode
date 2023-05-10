func hIndex(citations []int) int {
    var citationsCount = len(citations)
    var buckets = make([]int, citationsCount + 1)
    for i := range buckets {
        buckets[i] = 0          
    } 

    for _, citation := range citations  {
        if (citation >= citationsCount) {
            buckets[citationsCount]++
        } else {
            buckets[citation]++
        }
    }

    var count = 0;
    for i := citationsCount; i >= 0; i-- {
        count += buckets[i]
        if count >= i {
            return i
        }
    }

    return 0
}
