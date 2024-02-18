<?php

class Solution 
{

    protected $sum = 0;
    protected $height = 0;

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function diagonalSum($mat) 
    {
        $this->height = count($mat[0]);
        $this->sumRecursive($mat, 0);

        return $this->sum;
    }

    protected function sumRecursive($mat, $i) 
    {
        if (!isset($mat[$i][$i])) {
            return;
        }

        $this->sum += $mat[$i][$i];
        if ($i != $this->height - 1 - $i) {
            $this->sum += $mat[$i][$this->height - 1 - $i];
        }

        $this->sumRecursive($mat, $i + 1);
    }
}

