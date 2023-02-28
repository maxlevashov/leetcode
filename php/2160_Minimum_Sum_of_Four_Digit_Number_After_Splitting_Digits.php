<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function minimumSum($num)
    {
        $num = strval($num);
        
        for ($i = 0; $i < strlen($num); $i++) {
            $nums[] = $num[$i];
        }
        sort($nums);
        
        return ($nums[0] . $nums[2]) + ($nums[1] . $nums[3]);
    }

}
