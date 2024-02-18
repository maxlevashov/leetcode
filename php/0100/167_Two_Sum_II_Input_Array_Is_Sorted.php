<?php

class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $leftPointer = 0;
        $rightPointer = count($numbers) - 1;
        while (true) {
            $sum = $numbers[$leftPointer] + $numbers[$rightPointer];
            if ($sum == $target) {
                break;
            } elseif ($sum < $target) {
                $leftPointer++;
            } elseif ($sum > $target) {
                $rightPointer--;
            } else {
                return [];
            }
        }
        
        return [$leftPointer + 1, $rightPointer + 1];
    }
}