<?php

class Solution 
{

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function dailyTemperatures($temperatures) 
    {
        $n = count($temperatures);
        $result = array_fill(0, $n, 0);
        $stack = new SplStack();

        for ($i = $n - 1; $i >= 0; --$i) {
            $currTemperature = $temperatures[$i];

            while (
                !$stack->isEmpty() 
                && $currTemperature >= $temperatures[$stack->top()]
            ) {
                $stack->pop();
            }

            if (!$stack->isEmpty()) {
                $result[$i] = $stack->top() - $i;
            }

            $stack->push($i);
        }

        return $result;
    }
}

