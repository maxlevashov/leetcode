<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $meetings
     * @param Integer $firstPerson
     * @return Integer[]
     */
    function findAllPeople($n, $meetings, $firstPerson) 
    {
        $graph = [];
        foreach ($meetings as $meeting) {
            $x = $meeting[0];
            $y = $meeting[1];
            $t = $meeting[2];
            $graph[$x][] = [$t, $y];
            $graph[$y][] = [$t, $x];
        }

        $earliest = array_fill(0, $n, PHP_INT_MAX);
        $earliest[0] = 0;
        $earliest[$firstPerson] = 0;

        $queue = new SplQueue();
        $queue->unshift([0, 0]);
        $queue->unshift([$firstPerson, 0]);

        while (!$queue->isEmpty()) {
           list($person, $time) = $queue->pop();
            foreach ($graph[$person] as $item) {
                $t = $item[0];
                $nextPerson = $item[1];
                if ($t >= $time && $earliest[$nextPerson] > $t) {
                    $earliest[$nextPerson] = $t;
                    $queue->unshift([$nextPerson, $t]);
                }
            }
        }

        $resutl = [];
        for ($i = 0; $i < $n; ++$i) {
            if ($earliest[$i] != PHP_INT_MAX) {
                $resutl[] = $i;
            }
        }
        return $resutl;
    }
}

