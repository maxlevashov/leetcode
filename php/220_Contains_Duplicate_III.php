<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $indexDiff
     * @param Integer $valueDiff
     * @return Boolean
     */
    function containsNearbyAlmostDuplicate($nums, $indexDiff, $valueDiff) 
    {
        $n = count($nums);
        if ($n == 0 || $indexDiff < 0  || $valueDiff < 0) {
            return false;
        }
        $buckets = [];
        
        for ($i = 0; $i < $n; ++$i) {
            $bucket = intval($nums[$i] / ($valueDiff + 1));
            
            if ($nums[$i] < 0) {
                --$bucket;
            }
            
            if (isset($buckets[$bucket])) {
                return true;
            } else {
                $buckets[$bucket] = $nums[$i];
                if (
                    isset($buckets[$bucket - 1]) 
                    && $nums[$i] - $buckets[$bucket - 1] <= $valueDiff
                ) {
                    return true; 
                }
                if (
                    isset($buckets[$bucket + 1]) 
                    && $buckets[$bucket + 1] - $nums[$i] <= $valueDiff
                ) {
                    return true;
                }
                
                if (count($buckets) > $indexDiff) {
                    $keyToRemove = intval($nums[$i - $indexDiff] / ($valueDiff + 1));
                    
                    if ($nums[$i - $indexDiff] < 0) {
                        --$keyToRemove;
                    }
                    
                    unset($buckets[$keyToRemove]);
                }
            }
        }
        
        return false;
    }
}

