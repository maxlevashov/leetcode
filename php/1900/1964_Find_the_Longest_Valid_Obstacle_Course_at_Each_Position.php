<?php

class Solution 
{

    /**
     * @param Integer[] $obstacles
     * @return Integer[]
     */
    function longestObstacleCourseAtEachPosition($obstacles) 
    {
        $obstaclesCount = count($obstacles);
        $length = 0;
        $result = array_fill(0, $obstaclesCount, 0);
        $increasingSubseq = array_fill(0, $obstaclesCount, 0);

        for ($i = 0; $i < $obstaclesCount; ++$i) {
            $left = 0;
            $right = $length;
            while ($left < $right) {
                $mid = intval(($left + $right) / 2);
                if ($increasingSubseq[$mid] <= $obstacles[$i]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid;
                }
            }
            $result[$i] = $left + 1;
            if ($length == $left) {
                $length++;
            }
            $increasingSubseq[$left] = $obstacles[$i];
        }

        return $result;
    }
}

