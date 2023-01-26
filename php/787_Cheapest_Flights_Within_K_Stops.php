<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $flights
     * @param Integer $src
     * @param Integer $dst
     * @param Integer $k
     * @return Integer
     */
    function findCheapestPrice($n, $flights, $src, $dst, $k)
    {
        $dist = array_fill(0, $n, PHP_INT_MAX);
        $dist[$src] = 0;

        for ($i = 0; $i <= $k; $i++) {
            $temp = $dist;
            foreach ($flights as $flight) {
                if ($dist[$flight[0]] !== PHP_INT_MAX) {
                    $temp[$flight[1]] = min($temp[$flight[1]], $dist[$flight[0]] + $flight[2]);
                }
            }
            $dist = $temp;
        }

        return $dist[$dst] === PHP_INT_MAX ? -1 : $dist[$dst];
    }

}
