<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $result = 0;
        
        foreach ($nums as $key => $num) {
            for ($i = $key + 1; $i < count($nums); $i++) {
                if ($num == $nums[$i]) {
                    $result++;
                }
            }
        }

        return $result;
    }
}

