<?php

class Solution {



    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) 
    {
        $board = array_fill(
            0, 
            $n,  
            array_fill(0, $n, false)
        );
	    
	return $this->solve($board, 0); 
    }

    protected function isSafe(&$board, $row, $col) 
    {
	$n = count($board);
	for ($i = 0; $i <= $row; $i++) {
            if ( 
                $board[$i][$col]
                || (
                    $row - $i >= 0 && $col - $i >= 0 
                    && $board[$row - $i][$col - $i]
                )
                || (
                    $row - $i >= 0 && $col + $i < $n 
                    && $board[$row - $i][$col + $i]
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
            return 1;
        }            

        $count = 0;
        for ($col = 0; $col < count($board); $col++){
            if ($this->isSafe($board, $row, $col)) {
                $board[$row][$col] = true; 
                $count += $this->solve($board, $row + 1);    
                $board[$row][$col] = false;    
            }
        }

        return $count;
    }
}

