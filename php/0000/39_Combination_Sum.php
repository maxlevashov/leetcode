<?php

class Solution 
{

    protected $target = 0;
    
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) 
    {
        $ans = [];
        $currComb = [];
        $this->target = $target;
        $this->combination($candidates, $currComb, 0, 0, $ans);
        return $ans;
    }

    protected function combination(
        &$candidates,  
        $currComb, 
        $currSum, 
        $currIndex, 
        &$ans
    ) {
        if ($currSum > $this->target) {
            return;
        } 
        if ($currSum == $this->target) {
            $ans[] = $currComb;
            return;
        }
        
        for ($i = $currIndex; $i < count($candidates); $i++) { 
            $currComb[] = $candidates[$i]; 
            $currSum += $candidates[$i];
            $this->combination($candidates, $currComb, $currSum, $i, $ans); 
            array_pop($currComb); 
            $currSum -= $candidates[$i];
        }
        
    }
}



