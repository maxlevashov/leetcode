<?php

class Solution 
{

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) 
    {
        $countGas = count($gas);
        $totalGas = 0;
        $totalCost = 0;
        $currGas = 0;
        $startingPoint = 0;

        for ($i = 0; $i < $countGas; $i++) {           
            $totalGas += $gas[$i];
            $totalCost += $cost[$i];           
            $currGas += $gas[$i] - $cost[$i];

            if ($currGas < 0) {               
                $startingPoint = $i + 1;  
                $currGas = 0;
            }
        }

        return $totalGas < $totalCost ? -1 : $startingPoint;   
    }
}

