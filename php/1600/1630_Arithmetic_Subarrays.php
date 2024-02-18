<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer[] $l
     * @param Integer[] $r
     * @return Boolean[]
     */
    function checkArithmeticSubarrays($nums, $l, $r) 
    {
        $ans = [];
        for ($i = 0; $i < count($l); $i++) {
            $arr = array_fill(0, $r[$i] - $l[$i] + 1, 0);
            for ($j = 0; $j < count($arr); $j++) {
                $arr[$j] = $nums[$l[$i] + $j];
            }
            $ans[] = $this->check($arr);

        }
        
        return $ans;
    }

    protected function check(&$arr) 
    {
        sort($arr);
        $diff = $arr[1] - $arr[0];
        
        for ($i = 2; $i < count($arr); $i++) {
            if ($arr[$i] - $arr[$i - 1] != $diff) {
                return false;
            }
        }
        
        return true;
    }
}

