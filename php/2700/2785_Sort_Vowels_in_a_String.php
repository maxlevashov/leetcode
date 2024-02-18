<?php

class Solution 
{
    protected array $vowels = [
        'a',  'e', 'o', 'u', 'i' , 'A', 'E', 'O', 'U', 'I'
    ];

    /**
     * @param String $s
     * @return String
     */
    function sortVowels($s) 
    {
        $temp = [];

        for ($i = 0; $i < strlen($s); $i++) {
            if ($this->isVowel($s[$i])) {
                $temp[] = ord($s[$i]);
            }
        }
        
        sort($temp);

        $j = 0;
        $result = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($this->isVowel($s[$i])) {
                $result .= chr($temp[$j]);
                $j++;
            } else {
                $result .= $s[$i];
            }
        }
        
        return $result;
    }

    protected function isVowel($c) 
    {
        return in_array($c, $this->vowels);
    }
}

