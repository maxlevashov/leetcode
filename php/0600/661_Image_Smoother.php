<?php

class Solution 
{

    /**
     * @param Integer[][] $img
     * @return Integer[][]
     */
    function imageSmoother($img) 
    {
        $m = count($img);
        $n = count($img[0]);

        $temp = array_fill(0, $n, 0);
        $prevVal = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $sum = 0;
                $count = 0;
                if ($i + 1 < $m) {
                    if ($j - 1 >= 0) {
                        $sum += $img[$i + 1][$j - 1];
                        $count += 1;
                    }
                    $sum += $img[$i + 1][$j];
                    $count += 1;
                    if ($j + 1 < $n) {
                        $sum += $img[$i + 1][$j + 1];
                        $count += 1;
                    }
                }
                if ($j + 1 < $n) {
                    $sum += $img[$i][$j + 1];
                    $count += 1;
                }
                $sum += $img[$i][$j];
                $count += 1;
                if ($j - 1 >= 0) {
                    $sum += $temp[$j - 1];
                    $count += 1;
                }
                if ($i - 1 >= 0) {
                    if ($j - 1 >=  0) {
                        $sum += $prevVal;
                        $count += 1;
                    }
                    $sum += $temp[$j];
                    $count += 1;

                    if ($j + 1 < $n) {
                        $sum += $temp[$j + 1];
                        $count += 1;
                    }
                }
                if ($i - 1 >= 0) {
                    $prevVal = $temp[$j];
                }
                $temp[$j] = $img[$i][$j];
                $img[$i][$j] = intval($sum / $count);
            }
        }

        return $img;
    }
}

