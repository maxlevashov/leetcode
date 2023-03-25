<?php

class Solution 
{

    protected $width;
    protected $height;
    protected $word;
    
    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) 
    {
        $this->width = count($board);
        $this->height = count($board[0]);
        $this->word = $word;
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                if (
                    $board[$i][$j] == $this->word[0] 
                    && $this->dfs($i, $j, 0, $board)
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function dfs($i, $j, $count, &$board)
    {
        if (strlen($this->word) == $count) {
            return true;
        }
        
        if (
            $i < 0 
            || $i >= $this->width
            || $j < 0 
            || $j >= $this->height
            || $board[$i][$j] != $this->word[$count]
        ) {
            return false;
        }
            
        $temp = $board[$i][$j];                    
        $board[$i][$j] = ' ';                         
        $result = $this->dfs($i - 1, $j, $count + 1, $board) 
            || $this->dfs($i + 1, $j, $count + 1, $board) 
            || $this->dfs($i, $j - 1, $count + 1, $board) 
            || $this->dfs($i, $j + 1, $count + 1, $board);
        $board[$i][$j] = $temp; 

        return $result;
    }
}

