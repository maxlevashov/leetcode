<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement($nums) 
    {
        $elementCountMap = [];    
        $countNums = count($nums); 
        for ($i = 0; $i < $countNums; $i++) {
            $elementCountMap[$nums[$i]]++;
        }
        $majorityElements = [];
        $threshold = intval($countNums / 3);
        
        foreach ($elementCountMap as $element => $count) {
            if ($count > $threshold) {
                $majorityElements[] = $element;
            }
        }
        
        return $majorityElements; 
    }
}
