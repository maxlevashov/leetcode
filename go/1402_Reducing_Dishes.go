import (
	"sort"
)

func maxSatisfaction(satisfaction []int) int {
    sort.Sort(sort.Reverse(sort.IntSlice(satisfaction)))
    var tempSum, totalSum = 0, 0
    for _, dish := range satisfaction  {
        tempSum += dish
        if (tempSum < 0) {
            break;
        }
        totalSum += tempSum
    }

    return totalSum
}


