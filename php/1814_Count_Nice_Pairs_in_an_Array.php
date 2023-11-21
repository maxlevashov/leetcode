<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countNicePairs($nums) 
    {
        $arr = [];
        for ($i = 0; $i < count($nums); $i++) {
            $arr[] = $nums[$i] - $this->rev($nums[$i]);
        }
        
        $dic = [];
        $result = 0;
        $mod = 1e9 + 7;
        foreach ($arr as $num) {
            $result = ($result + $dic[$num]) % $mod;
            $dic[$num]++;
        }
        
        return $result;
    }

    protected function rev(int $num) 
    {
        $result = 0;
        while ($num > 0) {
            $result = $result * 10 + $num % 10;
            $num = intval($num / 10);
        }
 
        return $result;
    }
}
