object Solution {
    def canPlaceFlowers(flowerbed: Array[Int], n: Int): Boolean = {
        var countFlowers = n;
        for (i <- 0 to (flowerbed.length - 1)) {
            if (
                flowerbed(i) == 0 
                && (i == 0 || flowerbed(i - 1) == 0)
                && (i == flowerbed.length - 1 || flowerbed(i + 1) == 0)
            ) {
                flowerbed(i) = 1;
                countFlowers -= 1;
            }
        }
        return countFlowers <= 0;
    }
}
