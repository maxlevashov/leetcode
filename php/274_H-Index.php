<?php

class Solution 
{

    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex($citations) 
    {
        $citationsCount = count($citations);
        $buckets = array_fill(0, $citationsCount + 1, 0);

        foreach ($citations as $citation) {
            if ($citation >= $citationsCount) {
                $buckets[$citationsCount]++;
            } else {
                $buckets[$citation]++;
            }
        }

        $count = 0;
        for ($i = $citationsCount; $i >= 0; $i--) {
            $count += $buckets[$i];
            if ($count >= $i) {
                return $i;
            }
        }

        return 0;
    }
}

