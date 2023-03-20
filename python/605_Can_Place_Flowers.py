class Solution:
    def canPlaceFlowers(self, flowerbed: List[int], n: int) -> bool:
        for i, num in enumerate(flowerbed):
            isCurrentPlaceClear = flowerbed[i] == 0
            isPreviousPlaceClear = i == 0 or flowerbed[i - 1] == 0
            isNextPlaceClear = i == len(flowerbed) - 1 or flowerbed[i + 1] == 0
            if isCurrentPlaceClear and isPreviousPlaceClear and isNextPlaceClear:
                flowerbed[i] = 1
                n -= 1
        return n <= 0
