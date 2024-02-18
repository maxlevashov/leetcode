<?php

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $visited = [];
        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                $number = $board[$i][$j];
                if ($number != '.') {
                    if (isset($visited[$number . " in row " . $i])
                        || isset($visited[$number . " in column " . $j])
                        || isset($visited[$number . " in block " . intval($i / 3) . "-" . intval($j / 3)])
                    ) {
                        return false;
                    }
                    $visited[$number . " in row " . $i] = false;
                    $visited[$number . " in column " . $j] = false;
                    $visited[$number . " in block " . intval($i / 3)  . "-" . intval($j / 3)] = false;
                }
            }
        }
            
        return true;
    }
}

