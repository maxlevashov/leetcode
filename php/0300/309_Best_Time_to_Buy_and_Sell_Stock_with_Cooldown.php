<?php

class Solution 
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) 
    {
        $coolDown = 0;
        $sell = 0;
        $hold = PHP_INT_MIN;
        
        foreach ($prices as $stockPrice) {   
            $prevCoolDown = $coolDown;
            $prevSell = $sell;
            $prevHold = $hold;

            $coolDown = max($prevCoolDown, $sell);
            $sell = $prevHold + $stockPrice;
            $hold = max($hold, $prevCoolDown - $stockPrice); 
        }
        
        return max($coolDown, $sell);
    }
}

