<?php

class Solution
{

    /**
     * @param String $moves
     * @return Boolean
     */
    function judgeCircle($moves)
    {
        $x = 0;
        $y = 0;
        for ($i = 0, $strLen = strlen($moves); $i < $strLen; $i++) {
            if ($moves[$i] == 'U') {
                $y += 1;
            } elseif ($moves[$i] == 'D') {
                $y -= 1;
            } elseif ($moves[$i] == 'L') {
                $x -= 1;
            } elseif ($moves[$i] == 'R') {
                $x += 1;
            }
        }

        return $x == 0 && $y == 0;
    }

}
