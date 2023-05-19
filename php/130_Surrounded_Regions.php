<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board)
    {
        $i = 0;
        $j = 0;
        $row = count($board);
        if (!$row) {
            return;
        }
        $col = count($board[0]);

        for ($i = 0; $i < $row; $i++) {
            $this->check($board, $i, 0, $row, $col);
            if ($col > 1) {
                $this->check($board, $i, $col - 1, $row, $col);
            }
        }
        for ($j = 1; $j + 1 < $col; $j++) {
            $this->check($board, 0, $j, $row, $col);
            if ($row > 1) {
                $this->check($board, $row - 1, $j, $row, $col);
            }
        }
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($board[$i][$j] == 'O') {
                    $board[$i][$j] = 'X';
                }
            }
        }
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($board[$i][$j] == '1') {
                    $board[$i][$j] = 'O';
                }
            }
        }
    }

    function check(&$vec, int $i, int $j, int $row, int $col)
    {
        if ($vec[$i][$j] == 'O') {
            $vec[$i][$j] = '1';
            if ($i > 1) {
                $this->check($vec, $i - 1, $j, $row, $col);
            }
            if ($j > 1) {
                $this->check($vec, $i, $j - 1, $row, $col);
            }
            if ($i + 1 < $row) {
                $this->check($vec, $i + 1, $j, $row, $col);
            }
            if ($j + 1 < $col) {
                $this->check($vec, $i, $j + 1, $row, $col);
            }
        }
    }

}
