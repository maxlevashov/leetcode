<?php

class Solution
{

    /**
     * @param Integer[] $hand
     * @param Integer $groupSize
     * @return Boolean
     */
    function isNStraightHand($hand, $groupSize)
    {
        sort($hand);
        $cardCounts = [];
        foreach ($hand as $item) {
            if (!isset($cardCounts[$item])) {
                $cardCounts[$item] = 1;
            } else {
                $cardCounts[$item]++;
            }
        }
        while (count($cardCounts) > 0) {
            $cardFirst = array_key_first($cardCounts);
            for ($i = $cardFirst; $i < $cardFirst + $groupSize; $i++) {
                if (!isset($cardCounts[$i])) {
                    return false;
                }
                $count = $cardCounts[$i];
                if ($count == 1) {
                    unset($cardCounts[$i]);
                } else {
                    $cardCounts[$i]--;
                }
            }
        }
        return true;
    }

}
