<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function numberOfSteps($num)
    {
        $result = 0;
        while ($num > 0) {
            ++$result;
            if (($num % 2) == 0) {
                $num /= 2;
            } else {
                --$num;
            }
        }
        return $result;
    }

}
