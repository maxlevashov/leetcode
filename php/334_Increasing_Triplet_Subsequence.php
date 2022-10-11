<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums) {
        if (count(array_unique($nums)) < 3) {
            return false;
        }
        $i = 0;
        $countNums = count($nums) - 1;
        while (true) {
            if ($i + 2 > $countNums) {
                break;
            }
            $j = $i + 1;
            
            while (true) {
                if ($j + 1 > $countNums) {
                    break;
                }
                $k = $j + 1;
                if ($nums[$i] < $nums[$j]) {
                    while (true) {
                        if ($k > $countNums) {
                            break;
                        }
                        if ($nums[$j] < $nums[$k]) {
                            return true;
                        }
                        $k++;
                    }
                }
                
                $j++;
            }
            
            $i++;
        }
        
        return false;
    }
}

