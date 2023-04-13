<?php

class Solution 
{

    /**
     * @param Integer[] $pushed
     * @param Integer[] $popped
     * @return Boolean
     */
    function validateStackSequences($pushed, $popped) 
    {
        $pushedCount = count($pushed);
        $stack = new SplStack();

        $j = 0;
        foreach ($pushed as $x) {
            $stack->push($x);
            while (
                !$stack->isEmpty() 
                && $stack->top() == $popped[$j]
            ) {
                $stack->pop();
                $j++;
            }
        }

        return $stack->isEmpty();
    }
}

