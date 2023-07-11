<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) 
    {
        $result = PHP_INT_MIN;
        $product = 1;
        $countNums = count($nums);

        for ($i = 0; $i < $countNums; $i++) {
            $product *= $nums[$i];
            $result = max($product, $result);
            if ($product == 0) {
                $product = 1;
            }
        }
        $product = 1;
        for ($i = $countNums - 1; $i >= 0; $i--) {
            $product *= $nums[$i];

            $result = max($product, $result);
            if ($product == 0) {
                $product = 1;
            }
        }

        return $result;
    }
}

