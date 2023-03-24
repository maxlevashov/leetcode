<?php

class Solution 
{

    protected $result = [];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) 
    {
        $current = [];
        $this->combineRecursive(1, $k, $current, $n);
        return $this->result;
    }

    protected function combineRecursive($idx, $k, &$current, $n)
    {
        if (count($current) == $k) {
            $this->result[] = $current;
            return;
        }
        
        for ($i = $idx; $i < $n + 1; $i++) {
            $current[] = $i;  
            $this->combineRecursive($i + 1, $k, $current, $n); 
            array_pop($current); 
        }
    }
}

