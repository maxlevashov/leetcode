<?php

class Solution 
{

    /**
     * @param String $s
     * @return String
     */
    function reorganizeString($s) 
    {
        $charCounts = array_fill(0, 26, 0);
        foreach (range(0, strlen($s)) as $i) {
            $charCounts[ord($s[$i]) - ord('a')] = $charCounts[ord($s[$i]) - ord('a')] + 1;
        }

        $pq = new SplPriorityQueue();
        foreach (range(0, 26) as $i) {
            if ($charCounts[$i] > 0) {
                $pq->insert([$charCounts[$i], $i + ord('a')], $charCounts[$i]);
            }
        }

        $result = '';
        while (!$pq->isEmpty()) {
            $first = $pq->extract();

            if (empty($result) || chr($first[1]) != $result[strlen($result) - 1]) {
                $result .= chr($first[1]);
                if (--$first[0] > 0) {
                    $pq->insert($first, $first[0]);
                }
            } else {
                if ($pq->isEmpty()) {
                    return '';
                }
                $second = $pq->extract();
                $result .= chr($second[1]);
                if (--$second[0] > 0) {
                    $pq->insert($second, $second[0]);
                }
                $pq->insert($first, $first[0]);
            }
        }

        return $result;
    }
}

