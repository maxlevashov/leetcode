<?php


class Solution {

    protected $sols = [];

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $board = array_fill(
            0, 
            $n,  
            str_pad('',  $n, '.')
        );
        $this->solve($board, 0);
        return $this->sols; 
    }

    protected function isSafe(&$board, $row, $col) 
    {
        $n = count($board);
        for ($i = 0; $i < $n; $i++) {
            if ( 
                $board[$i][$col] == 'Q'
                || (
                    $row - $i >= 0 && $col - $i >= 0 
                    && $board[$row - $i][$col - $i] == 'Q'
                )
                || (
                    $row - $i >= 0 && $col + $i < $n 
                    && $board[$row - $i][$col + $i] == 'Q'
                )
            ) {
                return false;
            }
        }

        return true;
    }

    protected function solve(&$board, $row) 
    {
	if ($row == count($board)) { 
            $this->sols[] = $board;
            return;
        }            

        for ($col = 0; $col < count($board); $col++){
            if ($this->isSafe($board, $row, $col)) {
                    $board[$row][$col] = 'Q'; 
                    $this->solve($board, $row + 1);    
                    $board[$row][$col] = '.';    
            }
        }
    }
}