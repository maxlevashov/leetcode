<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function sumEvenAfterQueries($nums, $queries)
    {
        $sum = 0;
        foreach ($nums as $num) {
            if ($num % 2 == 0) {
                $sum += $num;
            }
        }
        $countQueries = count($queries);
        $result = array_fill(0, $countQueries, 0);

        for ($i = 0; $i < $countQueries; $i++) {
            $index = $queries[$i][1];
            if ($nums[$index] % 2 == 0) {
                $sum -= $nums[$index];
            }
            $nums[$index] += $queries[$i][0];
            if ($nums[$index] % 2 == 0) {
                $sum += $nums[$index];
            }
            $result[$i] = $sum;
        }
        return $result;
    }

}
