<?php

class Solution
{

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts)
    {
        $maxSum = 0;
        $tempSum = 0;
        foreach ($accounts as $arAccount) {
            foreach ($arAccount as $price) {
                $tempSum += $price;
            }
            $maxSum = max($maxSum, $tempSum);
            $tempSum = 0;
        }

        return $maxSum;
    }

}
