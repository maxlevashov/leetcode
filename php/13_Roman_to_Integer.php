<?php

class Solution
{

    const MAP_NUMBERS = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $value = 0;
        $stringLength = strlen($s);
        for ($i = 0; $i < $stringLength; $i++) {
            if (
                    isset($s[$i + 1]) && self::MAP_NUMBERS[$s[$i]] < self::MAP_NUMBERS[$s[$i + 1]]
            ) {
                $value += self::MAP_NUMBERS[$s[$i + 1]] - self::MAP_NUMBERS[$s[$i]];
                $i++;
            } else {
                $value += self::MAP_NUMBERS[$s[$i]];
            }
        }

        return $value;
    }

}
