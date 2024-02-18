<?php

class Solution
{

    protected $arWords = [
        'DIVISIBLE_BY_3_5' => 'FizzBuzz',
        'DIVISIBLE_BY_3' => 'Fizz',
        'DIVISIBLE_BY_5' => 'Buzz',
    ];

    /**
     * @param Integer $n
     * @return String[]
     */
    function fizzBuzz($n)
    {
        $arResult = [];
        foreach (range(1, $n) as $number) {
            $arResult[] = $this->divisible($number);
        }

        return $arResult;
    }

    /**
     * @param Integer $n
     * @return String
     */
    protected function divisible($n)
    {
        $result = '';
        if ($n % 3 == 0 && $n % 5 == 0) {
            $result = $this->arWords['DIVISIBLE_BY_3_5'];
        } else if ($n % 5 == 0) {
            $result = $this->arWords['DIVISIBLE_BY_5'];
        } else if ($n % 3 == 0) {
            $result = $this->arWords['DIVISIBLE_BY_3'];
        } else {
            $result = (string) $n;
        }

        return $result;
    }

}
