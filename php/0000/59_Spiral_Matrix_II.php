<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) 
    {
        $result = array_fill(0, $n, array_fill(0, $n, 0));
        $rowBegin = 0;
        $rowEnd = $n - 1;
        $columnBegin = 0;
        $columnEnd = $n - 1;
        $counter = 1;

        while ($rowBegin <= $rowEnd && $columnBegin <= $columnEnd) {
            for ($i = $columnBegin; $i <= $columnEnd; $i++) {
                $result[$rowBegin][$i] = $counter++;
            }          
            $rowBegin++;

            for ($i = $rowBegin; $i <= $rowEnd; $i++) {
                $result[$i][$columnEnd] = $counter++;
            }
            $columnEnd--;

            if ($rowBegin <= $rowEnd) {
                for ($i = $columnEnd; $i >= $columnBegin; $i--) {
                    $result[$rowEnd][$i] = $counter++;
                }
            }
            $rowEnd--;

            if ($columnBegin <= $columnEnd) {
                for ($i = $rowEnd; $i >= $rowBegin; $i--) {
                    $result[$i][$columnBegin] = $counter++;
                }
            }
            $columnBegin++;
        }

        return $result;
    }
}
