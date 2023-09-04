<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) 
    {
        $stack = new SplStack();
        $result = 0;
        $number = 0;
        $sign = 1;
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (is_numeric($char)) {
                $number = 10 * $number + (int) ($char - '0');
            } elseif ($char == '+') {
                $result += $sign * $number;
                $number = 0;
                $sign = 1;
            } elseif ($char == '-') {
                $result += $sign * $number;
                $number = 0;
                $sign = -1;
            } elseif ($char == '(') {
                $stack->push($result);
                $stack->push($sign);
                $sign = 1;   
                $result = 0;
            } elseif ($char == ')') {
                $result += $sign * $number;  
                $number = 0;
                $result *= $stack->pop();
                $result += $stack->pop();
            }
        }
        if ($number != 0) {
            $result += $sign * $number;
        }

        return $result;
    }
}

