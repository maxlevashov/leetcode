<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums)
    {
        if (count($nums) <= 1) {
            return $nums;
        }

        $mid = intval(count($nums) / 2);
        $leftList = $this->sortArray(array_slice($nums, 0, $mid));
        $rightList = $this->sortArray(array_slice($nums, $mid));

        return $this->merge($leftList, $rightList);
    }

    protected function merge($leftList, $rightList)
    {
        $result = [];
        $leftIndex = 0;
        $rightIndex = 0;

        for ($i = 0; $i < count($leftList) + count($rightList); $i++) {
            if (
                $leftIndex < count($leftList) 
                && $rightIndex < count($rightList)
            ) {
                if ($leftList[$leftIndex] <= $rightList[$rightIndex]) {
                    $result[] = $leftList[$leftIndex];
                    $leftIndex += 1;
                } else {
                    $result[] = $rightList[$rightIndex];
                    $rightIndex += 1;
                }
            } elseif ($leftIndex == count($leftList)) {
                $result[] = $rightList[$rightIndex];
                $rightIndex += 1;
            } elseif ($rightIndex == count($rightList)) {
                $result[] = $leftList[$leftIndex];
                $leftIndex += 1;
            }
        }

        return $result;
    }

}
