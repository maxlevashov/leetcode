<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $map = [];
        $result = 0;

        foreach ($nums as $key => $num) {
            if (isset($map[$num])) {
                unset($nums[$key]);
            } else {
                $map[$num] = false;
                $result++;
            }
        }

        return $result;
    }

}
