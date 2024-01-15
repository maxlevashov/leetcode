<?php

class Solution 
{

    /**
     * @param Integer[][] $matches
     * @return Integer[][]
     */
    function findWinners($matches) 
    {
        $losses = array_fill(0, 100001, 0);

        for ($i = 0; $i < count($matches); $i++) {
            $win = $matches[$i][0];
            $loss = $matches[$i][1];

            if ($losses[$win] == 0) {
                $losses[$win] = -1;
            } 

            if ($losses[$loss] == -1) {
                $losses[$loss] = 1;
            } else {
                $losses[$loss]++;
            }
        }

        $zeroLoss = [];
        $oneLoss = [];
        $result = [];

        for ($i = 0; $i < count($losses); $i++) {
            if ($losses[$i] == -1) {
                $zeroLoss[] = $i;
            } elseif ($losses[$i] == 1) {
                $oneLoss[] = $i;
            }
        }

        $result[] = $zeroLoss;
        $result[] = $oneLoss;

        return $result;
    }
}

