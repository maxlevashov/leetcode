<?php

class Solution 
{

    /**
     * @param String[] $bank
     * @return Integer
     */
    function numberOfBeams($bank) 
    {
        $prev = 0;
        $result = 0;
        
        foreach ($bank as $item) {
            $count = 0;
            $len = strlen($item);
            for ($i = 0; $i < $len; $i++) {
                if ($item[$i] == '1') {
                    $count++;
                }
            }
            if ($count != 0) {
                $result += ($prev * $count);
                $prev = $count;
            }
        }
        
        return $result;
    }
}

