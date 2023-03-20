<?php

class Solution
{

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n)
    {
        foreach ($flowerbed as $key => $item) {
            if (
                $this->isCurrentPlaceClear($item) 
                && $this->isPreviousPlaceClear($flowerbed, $key) 
                && $this->isNextPlaceClear($flowerbed, $key)
            ) {
                $flowerbed[$key] = 1;
                $n--;
            }
        }

        return $n <= 0;
    }

    protected function isCurrentPlaceClear($item)
    {
        return $item == 0;
    }

    protected function isPreviousPlaceClear($flowerbed, $key)
    {
        return $flowerbed[$key - 1] === 0 || $key == 0;
    }

    protected function isNextPlaceClear($flowerbed, $key)
    {
        return $flowerbed[$key + 1] === 0 || $key == count($flowerbed) - 1;
    }

}
