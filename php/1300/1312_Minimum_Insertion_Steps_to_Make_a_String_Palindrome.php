<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function minInsertions($s) 
    {
        $wordLen = strlen($s);
        $dp = array_fill(0, $wordLen, 0);

        for ($i = $wordLen - 2; $i >= 0; $i--) {
            $prev = 0;
            for ($j = $i + 1; $j < $wordLen; $j++) {
                $temp = $dp[$j];
                if ($s[$i] == $s[$j]) {
                    $dp[$j] = $prev;
                } else {
                    $dp[$j] = min($dp[$j], $dp[$j - 1]) + 1;
                }
                $prev = $temp;
            }
        }

        return $dp[$wordLen - 1];
    }
}

