<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[] $primes
     * @return Integer
     */
    function nthSuperUglyNumber($n, $primes) 
    {
        if ($n == 1) {
            return 1;
        }
            
        $numPrimes = count($primes);  
        $primeIndices = array_fill(0, $numPrimes, 0);  
        $superUgly = [];  
        $superUgly[0] = 1; 

        for ($i = 1; $i < $n; $i++) {
            $minVal = PHP_INT_MAX;  
            for ($j = 0; $j < $numPrimes; $j++) {
                $minVal = min($minVal, $primes[$j] * $superUgly[$primeIndices[$j]]);
            }
            $superUgly[$i] = $minVal; 
            for ($j = 0; $j < $numPrimes; $j++) {
                if ($minVal == $primes[$j] * $superUgly[$primeIndices[$j]]) {
                    $primeIndices[$j]++;
                }
            }
        }

        return $superUgly[$n - 1];
    }
}

