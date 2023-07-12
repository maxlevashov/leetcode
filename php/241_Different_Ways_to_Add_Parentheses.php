<?php

class Solution 
{

    /**
     * @param String $expression
     * @return Integer[]
     */
    function diffWaysToCompute($expression) 
    {
        if (isset($memo[$expression])) {
            return $memo[$expression]; 
        }
        $left = [];
        $right = [];
        $result = [];

        for ($i = 0; $i < strlen($expression); ++$i) {
            if (
                $expression[$i] == '+' 
                || $expression[$i] == '-' 
                || $expression[$i] == '*'
            ){
                $inLeft = substr($expression, 0, $i);
                $inRight = substr($expression, $i + 1);
                $left = $this->diffWaysToCompute($inLeft);
                $right = $this->diffWaysToCompute($inRight);
            }
            foreach ($left as $a) {
                foreach ($right as $b) {
                    if ($expression[$i] == '+') {
                        $result[] = $a + $b;
                    } elseif ($expression[$i] == '-') {
                        $result[] = $a - $b;
                    } elseif ($expression[$i] == '*') {
                        $result[] = $a * $b;
                    }
                }
            }
        }
        if (empty($result)) {
            $result[] = intval($expression);
        }

        return $memo[$expression] = $result;
    }
}

