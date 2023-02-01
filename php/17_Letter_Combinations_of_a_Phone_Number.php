<?php

class Solution
{

    protected $mapping = ["", "", "abc", "def", "ghi", 
        "jkl", "mno", "pqrs", "tuv", "wxyz"];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        $answer = [];
        if (empty($digits)) {
            return $answer;
        }

        $answer[] = '';
        for ($i = 0; $i < strlen($digits); $i++) {
            $tmp = [];
            for ($j = 0; $j < strlen($this->mapping[$digits[$i]]); $j++) {
                for ($k = 0; $k < count($answer); $k++) {
                    $tmp[] = $answer[$k] . $this->mapping[$digits[$i]][$j];
                }
            }
            $answer = array_reverse($tmp);
        }

        return $answer;
    }

}
