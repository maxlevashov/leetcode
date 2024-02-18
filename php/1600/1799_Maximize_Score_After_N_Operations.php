<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxScore($nums) 
    {
        $dp = array_fill(0, 1 << 14, -1);
        $numsCount = count($nums);
        $gcd = array_fill(0, $numsCount, array_fill(0, $numsCount, 0));

        for ($i = 0; $i < $numsCount; $i++) {
            for ($j = 0; $j < $numsCount; $j++) {
                $gcd[$i][$j] = $this->gcd($nums[$i], $nums[$j]);
            }
        }

        return $this->maxScoreRecursive($nums, 1, 0, $dp, $gcd);
    }

    protected function maxScoreRecursive(
        array &$nums,
        int $op, 
        int $mask, 
        array &$dp,
        array &$gcd
    ) {
        $numsCount = count($nums);
        $numsCountHalf = intval($numsCount / 2);

        if ($op > $numsCountHalf) {
            return 0;
        }
        if ($dp[$mask] != -1) {
            return $dp[$mask];
        }

        for ($i = 0; $i < $numsCount; $i++) {
            if ($mask & (1 << $i)) {
                continue;
            }
            for ($j = $i + 1; $j < $numsCount; $j++) {
                if ($mask & (1 << $j)) {
                    continue;
                }
                
                $newMask = (1 << $i) | (1 << $j) | $mask;
                $score = $op * $gcd[$i][$j] 
                    + $this->maxScoreRecursive($nums, $op + 1, $newMask, $dp, $gcd);
                $dp[$mask] = max($dp[$mask], $score);
            }
        }

        return $dp[$mask];
    }

    protected function gcd ($a, $b) 
    {
        return $b ? $this->gcd($b, $a % $b) : $a;
    }
}

