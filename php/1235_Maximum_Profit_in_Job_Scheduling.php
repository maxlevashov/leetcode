<?php

class Solution 
{

    /**
     * @param Integer[] $startTime
     * @param Integer[] $endTime
     * @param Integer[] $profit
     * @return Integer
     */
    function jobScheduling($startTime, $endTime, $profit) 
    {
        $numJobs = count($profit);
        $jobs = [];

        for ($i = 0; $i < $numJobs; ++$i) {
            $jobs[$i] = new Job($endTime[$i], $startTime[$i], $profit[$i]);
        }

        usort($jobs, function($a, $b) {
            return $a->endTime > $b->endTime;
        });
        $dp = array_fill(0, $numJobs + 1, 0);

        for ($i = 0; $i < $numJobs; ++$i) {
            $endTimeValue = $jobs[$i]->endTime;
            $startTimeValue = $jobs[$i]->startTime;
            $profitValue = $jobs[$i]->profit;

            $latestNonConflictJobIndex = $this->upperBound($jobs, $i, $startTimeValue);
            $dp[$i + 1] = max($dp[$i], $dp[$latestNonConflictJobIndex] + $profitValue);
        }

        return $dp[$numJobs];
    }

    protected function upperBound($jobs, int $endIndex, int $targetTime) 
    {
        $low = 0;
        $high = $endIndex;

        while ($low < $high) {
            $mid = intval(($low + $high) / 2);
            if ($jobs[$mid]->endTime <= $targetTime) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return $low;
    }

    
}

class Job {
    public int $endTime;
    public int $startTime;
    public int $profit;

    public function __construct(int $endTime, int $startTime, int $profit) 
    {
        $this->endTime = $endTime;
        $this->startTime = $startTime;
        $this->profit = $profit;
    }
}

