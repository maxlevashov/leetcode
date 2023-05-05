<?php

class Solution 
{

    protected $vowels = [
        'a' => true,
        'e' => true,
        'i' => true, 
        'o' => true,
        'u' => true,
    ];

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k) 
    {
        $max = [];
        $sum = 0; 
        $start = 0;
        for ($end = 0; $end < strlen($s); $end++) {
            if (isset($this->vowels[$s[$end]])) {
                $sum++;
            }
            
            if ($end >= $k - 1) {
                $max[] = $sum; 
                if (isset($this->vowels[$s[$start]])) {
                    $sum--;
                }   
                $start++;  
            }
        }

        return max($max);
    }
}

