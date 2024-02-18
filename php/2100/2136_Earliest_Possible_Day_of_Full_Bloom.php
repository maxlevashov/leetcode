<?php

class Solution 
{

    /**
     * @param Integer[] $plantTime
     * @param Integer[] $growTime
     * @return Integer
     */
    function earliestFullBloom($plantTime, $growTime) 
    {
        $indices = [];
        for ($i = 0; $i < count($growTime); ++$i) {
            $indices[] = $i;
        }
        usort($indices, function($a, $b) use ($growTime) {
            return $growTime[$b] - $growTime[$a];
        });
        $result = 0;
        $curPlantTime = 0;

        foreach ($indices as $index) {
            $curPlantTime += $plantTime[$index];
            $result = max($result, $curPlantTime + $growTime[$index]);
        }

        return $result;
    }
}

