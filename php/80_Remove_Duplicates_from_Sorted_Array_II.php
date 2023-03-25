<?php

class Solution {

    const COUNT_DUPLICATES = 2;


    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            while (++$map[$nums[$i]] > self::COUNT_DUPLICATES) {
                $this->moveElementsOnEmptyPlace($i, $nums);
                $map[$nums[$i]]--;
            }
        }

        return count($nums);
    }

    protected function moveElemntsOnEmptyPlace($i, $nums) {
        for ($j = $i; $j < count($nums); $j++) {
            if (isset($nums[$j + 1])) {
                $nums[$j] = $nums[$j + 1];
            } else { 
                unset($nums[$j]);
            }
        }
    }
}
