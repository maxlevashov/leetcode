<?php

class Solution 
{

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicateLetters($s) 
    {
        $stack = new SplStack();
        $seen = [];
        $lastOcc = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $lastOcc[$s[$i]] = $i;
        }
        
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (!isset($seen[$char])) {
                while (
                    !$stack->isEmpty() 
                    && $char < $stack->top() 
                    && $i < $lastOcc[$stack->top()]
                ) {
                    unset($seen[$stack->top()]);
                    $stack->pop();
                }
                $seen[$char] = true;
                $stack->push($char);
            }
        }
        
        $result = '';
        while (!$stack->isEmpty()) {
            $result = $stack->top() . $result;
            $stack->pop();
        }

        return $result;
    }
}

