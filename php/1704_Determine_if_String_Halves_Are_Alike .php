<?php

class Solution {

    protected $map = ['a'=>1, 'e'=>1, 'i'=>1, 'o'=>1, 'u'=>1];

    /**
     * @param String $s
     * @return Boolean
     */
    function halvesAreAlike($s) 
    {
        $len = strlen($s);
        $mid = $len / 2;

        $left = substr($s, 0, $mid);
        $right = substr($s, $mid);
        
        return $this->countVowels($left) == $this->countVowels($right);
    }

    protected function countVowels($str) 
    {
        $count = 0;

        for ($i = 0; $i < strlen($str); ++$i) {
            if (isset($this->map[strtolower($str[$i])])) {
                $count++;
            }
        }

        return $count;
    }
}

