class Solution {
    fun canPlaceFlowers(flowerbed: IntArray, n: Int): Boolean {
        var countFlowers = n;
        for (i in 0 until flowerbed.size) {
            if (
                flowerbed[i] == 0 
                && (i == 0 || flowerbed[i - 1] == 0)
                && (i == flowerbed.size - 1 || flowerbed[i + 1] == 0)
            ) {
                flowerbed[i] = 1;
                countFlowers--;
            }
        }

        return countFlowers <= 0;
    }
}
