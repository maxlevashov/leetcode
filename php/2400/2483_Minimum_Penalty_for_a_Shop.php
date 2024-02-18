<?php

class Solution {

    /**
     * @param String $customers
     * @return Integer
     */
    function bestClosingTime($customers) {
        $minPenalty = 0;
        $curPenalty = 0;
        $earliestHour = 0;

        for ($i = 0; $i < strlen($customers); $i++) {
            $char = $customers[$i];
            
            if ($char == 'Y') {
                $curPenalty--;
            } else {
                $curPenalty++;
            }

            if ($curPenalty < $minPenalty) {
                $earliestHour = $i + 1;
                $minPenalty = $curPenalty;
            }
        }

        return $earliestHour;
    }
}

