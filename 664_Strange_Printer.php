<?php

class Solution 
{

    protected $dp = [];
    protected $string = '';
    protected $stringLen = 0;

    /**
     * @param String $s
     * @return Integer
     */
    function strangePrinter($s) 
    {
        $this->string = $s;
        $this->stringLen = strlen($s);
        $this->dp = array_fill(
            0, 
            $this->stringLen, 
            array_fill(0, $this->stringLen, -1)
        );

        return $this->solve(0, $this->stringLen - 1) + 1;
    }

    protected function solve(int $left, int $right): int 
    {
        if ($this->dp[$left][$right] != -1) {
            return $this->dp[$left][$right];
        }
        
        $this->dp[$left][$right] = $this->stringLen;
        $j = -1;
        
        for ($i = $left; $i < $right; $i++) {
            if ($this->string[$i] != $this->string[$right] && $j == -1) {
                $j = $i;
            }
            
            if ($j != -1) {
                $this->dp[$left][$right] = min(
                    $this->dp[$left][$right], 
                    1 + $this->solve($j, $i) + $this->solve($i + 1, $right)
                );
            }
        }
        
        if ($j == -1) {
            $this->dp[$left][$right] = 0;
        }
        
        return $this->dp[$left][$right];
    }
}

