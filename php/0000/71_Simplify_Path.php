<?php

class Solution 
{

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path) 
    {
        $stack = new SplStack();
        $result = '';
        $paths = explode('/', $path);
        
        for ($i = 0; $i < count($paths); $i++) {
            if (!$stack->isEmpty() && $paths[$i] == '..') {
                $stack->pop();
            } elseif (
                $paths[$i] != '' 
                && $paths[$i] != '.'
                && $paths[$i] != '..'
            ) {
                $stack->push($paths[$i]);
            }
        }
        
        if ($stack->isEmpty()) {
            return '/';
        }
        while (!$stack->isEmpty()) {
            $result = '/' . $stack->pop() . $result;
        }
        
        return $result;
    }
}

