<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        sort($nums);

        return $this->kSum($nums, $target, 0, 4);
    }

    protected function kSum(&$nums, $target, $start, $k)
    {
        $result = [];
        if (count($nums) == $start) {
            return $result;
        }
        $averageValue = $target / $k;

        if (
            $nums[$start] > $averageValue 
            || $averageValue > $nums[count($nums) - 1]
        ) {
            return $result;
        }
        if ($k == 2) {
            return $this->twoSum($nums, $target, $start);
        }

        for ($i = $start; $i < count($nums); $i++) {
            if ($i === $start || $nums[$i - 1] != $nums[$i]) {
                foreach ($this->kSum(
                        $nums,
                        $target - $nums[$i],
                        $i + 1,
                        $k - 1
                ) as $subset) {
                    $result[] = [$nums[$i]];
                    $result[count($result) - 1] = array_merge(
                            $result[count($result) - 1], $subset);
                }
            }
        }
        return $result;
    }

    protected function twoSum(&$nums, $target, $start)
    {
        $result = [];
        $left = $start;
        $right = count($nums) - 1;
        while ($left < $right) {
            $sum = $nums[$left] + $nums[$right];
            if ($sum < $target 
                    || ($left > $start 
                        && $nums[$left - 1] == $nums[$left])) {
                ++$left;
            } elseif ($sum > $target 
                    || ($right < count($nums) - 1 
                        && $nums[$right] == $nums[$right + 1])) {
                --$right;
            } else {
                $result[] = [$nums[$left++], $nums[$right--]];
            }
        }

        return $result;
    }

}
