<?php

class Solution
{

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer[]
     */
    function selfDividingNumbers($left, $right)
    {
        $arResult = [];

        for ($i = $left; $i <= $right; $i++) {
            if ($this->isSelfDividing($i)) {
                $arResult[] = $i;
            }
        }

        return $arResult;
    }

    protected function isSelfDividing($num)
    {
        $numString = strval($num);
        $numStringLen = strlen($numString);
        for ($i = 0; $i < $numStringLen; $i++) {
            if ($numString[$i] == '0' || $num % ($numString[$i]) > 0) {
                return false;
            }
        }

        return true;
    }

}
