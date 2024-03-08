<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxFrequencyElements($nums) 
    {
        $frequencies = [];
        foreach ($nums as $num) {
            $frequencies[$num]++;
        }

        $maxFrequency = 0;
        foreach ($frequencies as $frequency) {
            $maxFrequency = max($maxFrequency,  $frequency);
        }

        $frequencyOfMaxFrequency = 0;
        foreach ($frequencies as $frequency) {
            if ($frequency == $maxFrequency) {
                $frequencyOfMaxFrequency++;
            }
        }

        return $frequencyOfMaxFrequency * $maxFrequency;
    }
}

