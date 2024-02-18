<?php

class Solution 
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxPoints($points) 
    {
        $n = count($points);
        $mx = 1;
        $my = 1;
        $x1 = 1;
        $y1 = 1;
        $result = 1;
        for ($i = 0; $i < $n; $i++) {
            $x1 = $points[$i][0];
            $y1 = $points[$i][1];
            for ($k = $i + 1; $k < $n; $k++) {
                $my = $points[$k][1] - $points[$i][1];
                $mx = $points[$k][0] - $points[$i][0];
                $temp = 0;
                foreach ($points as $point) {
                    $mx * ($point[1] - $y1) == $my * ($point[0] - $x1) ? $temp++ : 0;
                }
                $result = max($result, $temp);
            }
        }

        return $result;
    }
}

