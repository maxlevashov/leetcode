<?php

class Solution
{

    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones)
    {
        $result = 0;
        for ($i = 0; $i < strlen($stones); $i++) {
            if (strpos($jewels, $stones[$i]) !== false) {
                $result++;
            }
        }

        return $result;
    }

}
