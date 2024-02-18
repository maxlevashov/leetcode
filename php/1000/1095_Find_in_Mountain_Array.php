<?php

/**
 * // This is MountainArray's API interface.
 * // You should not implement it, or speculate about its implementation
 * class MountainArray {
 *     function get($index) {}
 *     function length() {}
 * }
 */

class Solution {
    /**
     * @param Integer $target
     * @param MountainArray $mountainArr
     * @return Integer
     */
    function findInMountainArray($target, $mountainArr) {
        $length = $mountainArr->n;
        $cache = [];

        $low = 1;
        $high = $length - 2;
        while ($low != $high) {
            $testIndex = ($low + $high) >> 1;
            $curr = 0;
            if (isset($cache[$testIndex])) {
                $curr = $cache[$testIndex];
            } else {
                $curr = $mountainArr->data[$testIndex];
                $cache[$testIndex] = $curr;
            }

            $next = 0;
            if (isset($cache[$testIndex + 1])) {
                $next = $cache[$testIndex + 1];
            } else {
                $next = $mountainArr->data[$testIndex + 1];
                $cache[$testIndex + 1] = $next;
            }

            if ($curr < $next) {
                if ($curr == $target) {
                    return  $testIndex;
                }
                if ($next == $target) {
                    return  $testIndex + 1;
                }
                $low = $testIndex + 1;
            } else {
                $high = $testIndex;
            }
        }

        $peakIndex = $low;

        $low = 0;
        $high = $peakIndex;
        while ($low <= $high) {
            $testIndex = ($low + $high) >> 1;

            $curr = 0;
            if (isset($cache[$testIndex])) {
                $curr = $cache[$testIndex];
            } else {
                $curr = $mountainArr->data[$testIndex];
            }
                
            if ($curr == $target) {
                return  $testIndex;
            } else if ($curr < $target) {
                $low = $testIndex + 1;
            } else {
                $high = $testIndex - 1;
            }
        }

        $low = $peakIndex + 1;
        $high = $length - 1;
        while ($low <= $high) {
            $testIndex = ($low + $high) >> 1;

            $curr = 0;
            if (isset($cache[$testIndex])) {
                $curr = $cache[$testIndex];
            } else {
                $curr = $mountainArr->data[$testIndex];
            }
                
            if ($curr == $target) {
                return  $testIndex;
            } else if ($curr > $target) {
                $low = $testIndex + 1;
            } else {
                $high = $testIndex - 1;
            }
        }


        return -1; 
    }
}

