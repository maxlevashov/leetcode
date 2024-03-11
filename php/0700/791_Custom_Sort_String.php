<?php

class Solution 
{

    /**
     * @param String $order
     * @param String $s
     * @return String
     */
    function customSortString($order, $s) 
    {
        $freq = [];
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            $letter = $s[$i];
            $freq[$letter]++;
        }

        $k = strlen($order);
        $result = '';
        for ($i = 0; $i < $k; $i++) {
            $letter = $order[$i];
            while ($freq[$letter] > 0) {
                $result .= $letter;
                $freq[$letter]--;
            }
        }

        foreach ($freq as $letter => $count) {
            while ($count > 0) {
                $result .= $letter;
                $count--;
            }
        }

        return $result;
    }
}

