<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board)
    {
        if (empty($board)) {
            return;
        }

        $this->solve($board);
    }

    protected function solve(&$board)
    {
        $boardCount = count($board);
        $boardColCount = count($board[0]);
        for ($i = 0; $i < $boardCount; $i++) {
            for ($j = 0; $j < $boardColCount; $j++) {
                if ($board[$i][$j] == '.') {
                    for ($k = 1; $k <= 9; $k++) {
                        if ($this->isValid($board, $i, $j, $k)) {
                            $board[$i][$j] = (string) $k;
                            if ($this->solve($board)) {
                                return true;
                            } else {
                                $board[$i][$j] = '.';
                            }
                        }
                    }

                    return false;
                }
            }
        }

        return true;
    }

    protected function isValid($board, $row, $col, $num)
    {
        $result = true;
        for ($i = 0; $i < 9; $i++) {
            if ($board[$i][$col] != '.' && $board[$i][$col] == $num) {
                $result = false;
            }
            if ($board[$row][$i] != '.' && $board[$row][$i] == $num) {
                $result = false;
            }
            $rowTemp = 3 * intval($row / 3) + intval($i / 3);
            $colTemp = 3 * intval($col / 3) + $i % 3;
            if (
                $board[$rowTemp][$colTemp] != '.' 
                && $board[$rowTemp][$colTemp] == $num
            ) {
                $result = false;
            }
        }

        return $result;
    }

}
