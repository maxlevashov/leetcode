<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function minJumps($arr) {
        $countNums = count($arr);
        $mapNums = [];
        for ($i = 0; $i < $countNums; $i++) {
            $mapNums[$arr[$i]][] = $i;
        }
        
        $queue = new SplQueue();
        $visited = array_fill(0, $countNums, false);
        $queue->enqueue(0);
        $steps = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            while ($size--) {
                $currIdx = $queue->dequeue();
                if ($currIdx == $countNums - 1) {
                    return $steps;
                }

                if ($currIdx + 1 < $countNums && !$visited[$currIdx + 1]) {
                    $visited[$currIdx + 1] = true;
                    $queue->enqueue($currIdx + 1);
                }
                if ($currIdx - 1 >= 0 && !$visited[$currIdx - 1]) {
                    $visited[$currIdx - 1] = true;
                    $queue->enqueue($currIdx - 1);
                }
                foreach ($mapNums[$arr[$currIdx]] as $newIdx) {                                 
                    if (!$visited[$newIdx]) {
                        $visited[$newIdx] = true;
                        $queue->enqueue($newIdx);
                    }
                }

                unset($mapNums[$arr[$currIdx]] );
            }
            $steps++;
        }

        return -1;
    }
}

