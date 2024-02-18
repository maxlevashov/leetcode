<?php

class Solution 
{

    /**
     * @param Integer[] $locations
     * @param Integer $start
     * @param Integer $finish
     * @param Integer $fuel
     * @return Integer
     */
    function countRoutes($locations, $start, $finish, $fuel) 
    {
        $n = count($locations);
        $memo = array_fill(0, $n, array_fill(0, $fuel + 1, -1));

        return $this->countRoutesRecursive($locations, $start, $finish, $fuel, $memo);
    }

    protected function countRoutesRecursive(
        array &$locations, 
        int $currCity, 
        int $finish, 
        int $remainingFuel,
        array &$memo
    ) {
        if ($remainingFuel < 0) {
            return 0;
        }
        if ($memo[$currCity][$remainingFuel] != -1) {
            return $memo[$currCity][$remainingFuel];
        }

        $ans = $currCity == $finish ? 1 : 0;
        for ($nextCity = 0; $nextCity < count($locations); $nextCity++) {
            if ($nextCity != $currCity) {
                $ans = ($ans + $this->countRoutesRecursive($locations, $nextCity, $finish,
                    $remainingFuel - abs($locations[$currCity] - $locations[$nextCity]),
                    $memo)) % 1000000007;
            }
        }

        return $memo[$currCity][$remainingFuel] = $ans;
    }
}

