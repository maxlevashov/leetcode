<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $trust
     * @return Integer
     */
    function findJudge($n, $trust)
    {
        if (count($trust) == 0 && $n == 1) {
            return 1;
        }
        $arCount = array_fill(0, $n + 1, 0);

        foreach ($trust as $arPair) {
            $arCount[$arPair[0]]--;
            $arCount[$arPair[1]]++;
        }

        for ($person = 0; $person < count($arCount); $person++) {
            if ($arCount[$person] === $n - 1) {
                return $person;
            }
        }

        return -1;
    }

}
