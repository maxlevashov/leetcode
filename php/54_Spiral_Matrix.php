<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $arResult = [];
        if (empty($matrix)) {
            return $arResult;
        }

        $rowStart = 0;
        $rowEnd = count($matrix) -  1;
        $columnStart = 0;
        $columnEnd = count($matrix[0]) - 1;

        while ($rowStart <= $rowEnd && $columnStart <= $columnEnd) {
            for ($i = $columnStart; $i <= $columnEnd; $i++) {
                $arResult[] = $matrix[$rowStart][$i];
            }
            $rowStart++;
            for ($i = $rowStart; $i <= $rowEnd; $i++) {
                $arResult[] = $matrix[$i][$columnEnd];
            }
            $columnEnd--;
            if ($rowStart <= $rowEnd) {
                for ($i = $columnEnd; $i >= $columnStart; $i--) {
                    $arResult[] = $matrix[$rowEnd][$i];
                }
            }
            $rowEnd--;
            if ($columnStart <= $columnEnd) {
                for ($i = $rowEnd; $i >= $rowStart; $i--) {
                    $arResult[] = $matrix[$i][$columnStart];
                }
            }
            $columnStart++;
        }

        return $arResult;
    }
}

