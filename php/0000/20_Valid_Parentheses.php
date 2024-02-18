<?php

class Solution 
{

    const MAP = [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) 
    {
        $stack = new SplStack();
        
        for ($i = 0; $i < strlen($s); $i++) {
            $curChar = $s[$i];
            
            if (isset(self::MAP[$curChar])) {
                $topElement = $stack->isEmpty() ? '#' : $stack->pop();
                
                if ($topElement != self::MAP[$curChar]) {
                    return false;
                }
            } else {
                $stack->push($curChar);
            }
        }
        
        return $stack->isEmpty();
    }
    
}
