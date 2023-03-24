<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) 
    {
        $this->quickSort($nums, 0, count($nums) - 1);
    }

    protected function quickSort(&$nums, $low, $high) 
    {
        if ($low < $high) {
            $pi = $this->partition($nums, $low, $high);
            $this->quickSort($nums, $low, $pi - 1);  
            $this->quickSort($nums, $pi + 1, $high); 
        }
    }

    protected function partition(&$nums, $low, $high)
    {
        $pivot = $nums[$high];  
        $i = ($low - 1);
        for ($j = $low; $j <= $high - 1; $j++) {
            if ($nums[$j] < $pivot){
                $i++;    
                $this->swap($nums[$i], $nums[$j]);
            }
        }
        $this->swap($nums[$i + 1], $nums[$high]);
        return ($i + 1);
    }

    protected function swap(&$a, &$b) 
    {
        list($a, $b) = [$b, $a];
    }
}

