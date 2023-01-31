<?php

class Solution
{

    /**
     * @param Integer[] $scores
     * @param Integer[] $ages
     * @return Integer
     */
    function bestTeamScore($scores, $ages)
    {
        $ageScorePair = [];
        for ($i = 0; $i < count($scores); $i++) {
            $ageScorePair[] = [$ages[$i], $scores[$i]];
        }

        sort($ageScorePair);
        
        return $this->findMaxScore($ageScorePair);
    }

    protected function findMaxScore(array &$ageScorePair)
    {
        $countAgeScorePair = count($ageScorePair);
        $answer = 0;

        $dp = array_fill(0, $countAgeScorePair, 0);
        for ($i = 0; $i < $countAgeScorePair; $i++) {
            $dp[$i] = $ageScorePair[$i][1];
            $answer = max($answer, $fp[$i]);
        }

        for ($i = 0; $i < $countAgeScorePair; $i++) {
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($ageScorePair[$i][1] >= $ageScorePair[$j][1]) {
                    $dp[$i] = max($dp[$i], $ageScorePair[$i][1] + $dp[$j]);
                }
            }
            $answer = max($answer, $dp[$i]);
        }
        
        return $answer;
    }

}
