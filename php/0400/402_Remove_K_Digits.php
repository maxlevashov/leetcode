<?php

class Solution
{

    /**
     * @param String $num
     * @param Integer $k
     * @return String
     */
    function removeKdigits($num, $k)
    {
        $ans = [];
        for ($i = 0; $i < strlen($num); $i++) {
            while (!empty($ans) && $ans[count($ans) - 1] > $num[$i] && $k) {
                array_pop($ans);
                $k--;
            }
            if (!empty($ans) || $num[$i] != '0') {
                $ans[] = $num[$i];
            }
        }
        while (!empty($ans) && $k--) {
            array_pop($ans);
        }

        $result = implode($ans);

        return ($result == "") ? "0" : $result;
    }

}
