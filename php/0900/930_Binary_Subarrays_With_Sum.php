<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $goal
     * @return Integer
     */
    function numSubarraysWithSum($nums, $goal) 
    {
        $totalCount = 0;
        $currentSum = 0;
        $freq = []; 

        foreach ($nums as $num) {
            $currentSum += $num;
            if ($currentSum == $goal) {
                $totalCount++;
            }

            if (!empty($freq[$currentSum - $goal])) {
                $totalCount += $freq[$currentSum - $goal];
            }

            $freq[$currentSum]++;
        }

        return $totalCount;
    }
}

