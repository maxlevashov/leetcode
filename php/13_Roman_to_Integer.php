<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $arNumbers = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];
        $value = 0;
        $stringLength = strlen($s);
        for ($i = 0; $i < $stringLength; $i++) {
            if (
                isset($s[$i + 1]) 
                && $arNumbers[$s[$i]] < $arNumbers[$s[$i + 1]]
            ) {
                $value += $arNumbers[$s[$i + 1]] - $arNumbers[$s[$i]];
                $i++;
            } else {
                $value += $arNumbers[$s[$i]];
            }
        }

        return $value;
    }

}
