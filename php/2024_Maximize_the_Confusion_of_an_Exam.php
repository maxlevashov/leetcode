<?php

class Solution 
{

    /**
     * @param String $answerKey
     * @param Integer $k
     * @return Integer
     */
    function maxConsecutiveAnswers($answerKey, $k) 
    {
        $n = strlen($answerKey);
        $left = $k;
        $right = $n;
        
        while ($left < $right) {
            $mid = intval(($left + $right + 1) / 2);
            
            if ($this->isValid($answerKey, $mid, $k)) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        
        return $left;
    }

    /**
     * 
     * @param string $answerKey
     * @param int $size
     * @param int $k
     * @return bool
     */
    protected function isValid(string $answerKey, int $size, int $k): bool
    {
        $n = strlen($answerKey);
        $counter = [];
        
        for ($i = 0; $i < $size; $i++) {
            $char = $answerKey[$i];
            $counter[$char]++;
        }
        
        if (min($counter['T'], $counter['F']) <= $k) {
            return true;
        }
        
        for ($i = $size; $i < $n; $i++) {
            $char1 = $answerKey[$i];
            $counter[$char1]++;
            $char2 = $answerKey[$i - $size];
            $counter[$char2]--;
            
            if (min($counter['T'], $counter['F']) <= $k) {
                return true;
            }
        }
        
        return false;
    }
}

