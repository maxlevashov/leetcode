<?php

class Solution 
{

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) 
    {
        $map = [
            "+" => function (int $a, int $b) { return $a + $b; },
            "-" => function (int $a, int $b) { return $a - $b; },
            "*" => function (int $a, int $b) { return $a * $b; },
            "/" => function (int $a, int $b) { return (int) $a / $b; },
        ];
        $stack = new SplStack();

        foreach ($tokens as $token) {
            if (!isset($map[$token])) {
                $stack->push((int) $token);
            } else {
                $op1 = $stack->top();
                $stack->pop();
                $op2 = $stack->top();
                $stack->pop();
                $stack->push((int) $map[$token]($op2, $op1));
            }
        }

        return $stack->top();
    }
}

