func canPlaceFlowers(flowerbed []int, n int) bool {
    for i:= 0; i < len(flowerbed); i++ {
        var isCurrentPlaceClear = flowerbed[i] == 0
        var isPreviousPlaceClear = i == 0 || flowerbed[i - 1] == 0
        var isNextPlaceClear = i == len(flowerbed) - 1 || flowerbed[i + 1] == 0
        if isCurrentPlaceClear && isPreviousPlaceClear && isNextPlaceClear {
            flowerbed[i] = 1;
            n--;
            i++;
        }
    }

    return n <= 0;
}
