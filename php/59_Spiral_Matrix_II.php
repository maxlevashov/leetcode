<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n)
    {
        $arResult = array_fill(0, $n, array_fill(0, $n, 0));

        $rowBegin = 0;
        $rowEnd = $n - 1;
        $columnBegin = 0;
        $columnEnd = $n - 1;

        $counter = 1;

        while ($rowBegin <= $rowEnd && $columnBegin <= $columnEnd) {

            for ($i = $columnBegin; $i <= $columnEnd; $i++) {
                $arResult[$rowBegin][$i] = $counter++;
            }

            $rowBegin++;

            for ($i = $rowBegin; $i <= $rowEnd; $i++) {
                $arResult[$i][$columnEnd] = $counter++;
            }
            $columnEnd--;

            if ($rowBegin <= $rowEnd) {
                for ($i = $columnEnd; $i >= $columnBegin; $i--) {
                    $arResult[$rowEnd][$i] = $counter++;
                }
            }
            $rowEnd--;

            if ($columnBegin <= $columnEnd) {
                for ($i = $rowEnd; $i >= $rowBegin; $i--) {
                    $arResult[$i][$columnBegin] = $counter++;
                }
            }
            $columnBegin++;
        }


        return $arResult;
    }

}
