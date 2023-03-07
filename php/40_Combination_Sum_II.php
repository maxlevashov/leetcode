<?php

class Solution 
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) 
    {
        $result = [];
        $currentComb = [];
        sort($candidates);
        $this->combination(0, $target, $candidates, $result, $currentComb);
        return $result;
    }

    protected function combination(
        $i, 
        $target,
        &$candidates,
        &$result,
        &$currentComb
    ){
        if ($target == 0){
            $result[] = $currentComb;
            return;
        }
        for ($index = $i; $index < count($candidates); $index++){
            if (
                $index > $i 
                && $candidates[$index] == $candidates[$index - 1]
            ) {
                continue;
            }
            if ($candidates[$index] > $target) {
                break;
            }
            $currentComb[] = $candidates[$index];
            $this->combination(
                $index + 1, $target - $candidates[$index], 
                $candidates, $result, $currentComb);
            array_pop($currentComb);
        }
    }
}

