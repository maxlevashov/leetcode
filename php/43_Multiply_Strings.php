<?php

class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2)
    {
        if ($num1 == '0' || $num2 == '0') {
            return '0';
        }
        $numFirstCount = strlen($num1);
        $numTwoCount = strlen($num2);
        $memo = array_fill(0, $numFirstCount + $numTwoCount, 0);
        for ($i = $numFirstCount - 1; $i >= 0; $i--) {
            for ($j = $numTwoCount - 1; $j >= 0; $j--) {
                $mul = ($num1[$i]) * ($num2[$j]);
                $p1 = $i + $j;
                $p2 = $i + $j + 1;
                $sum = $mul + $memo[$p2];
                $memo[$p1] += intval($sum / 10);
                $memo[$p2] = $sum % 10;
            }
        }

        $result = '';
        foreach ($memo as $key => $item) {
            if ($key == 0 && $item == 0) {
                continue;
            }
            $result .= $item;
        }

        return strlen($result) == 0 ? '0' : $result;
    }

}
