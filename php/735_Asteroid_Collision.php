<?php

class Solution 
{

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) 
    {
        $stack = new SplStack();
        
        foreach ($asteroids as $asteroid) {
            $flag = 1;
            while (!$stack->isEmpty() && ($stack->top() > 0 && $asteroid < 0)) {
                if (abs($stack->top()) < abs($asteroid)) {
                    $stack->pop();
                    continue;
                } elseif (abs($stack->top()) == abs($asteroid)) {
                    $stack->pop();
                }

                $flag = 0;
                break;
            }
            
            if ($flag) {
                $stack->push($asteroid);
            }
        }
        
        $remainingAsteroids = array_fill(0, $stack->count(), 0);
        for ($i = count($remainingAsteroids) - 1; $i >= 0; $i--) {
            $remainingAsteroids[$i] = $stack->pop();
        }
        
        return $remainingAsteroids;
    }
}

