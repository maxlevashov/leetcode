<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1) {
            return $s;
        }
        $return = '';
        $stringLength = strlen($s);
        $charsInSection = 2 * ($numRows - 1);

        for ($row = 0; $row < $numRows; $row++) {
           
            $index = $row;
            while ($index < $stringLength) {
                $return .= $s[$index];

                if ($row != 0 && $row != $numRows - 1) {
                    $charsInBetween = $charsInSection - 2 * $row;
                    $secondIndex = $index + $charsInBetween;

                    if ($secondIndex < $stringLength) {
                        $return .= $s[$secondIndex];
                    }
                }

                $index += $charsInSection;
            }
        }

        return $return;
    }
}

