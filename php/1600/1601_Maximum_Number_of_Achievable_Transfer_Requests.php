<?php

class Solution 
{

    protected $answer = 0;

    /**
     * @param Integer $n
     * @param Integer[][] $requests
     * @return Integer
     */
    function maximumRequests($n, $requests) 
    {
        $indegree = array_fill(0, $n, 0);
        $this->maxRequest($requests, $indegree, $n, 0, 0);
        
        return $this->answer;
    }

    /**
     * 
     * @param array $requests
     * @param array $indegree
     * @param int $n
     * @param int $index
     * @param int $count
     * @return void
     */
    protected function maxRequest(
        array &$requests, 
        array &$indegree, 
        int $n, 
        int $index, 
        int $count
    ): void {
        if ($index == count($requests)) {
            for ($i = 0; $i < $n; $i++) {
                if ($indegree[$i] != 0) {
                    return;
                }
            }
            
            $this->answer = max($this->answer, $count);
            return;
        }
        
        $indegree[$requests[$index][0]]--;
        $indegree[$requests[$index][1]]++;

        $this->maxRequest($requests, $indegree, $n, $index + 1, $count + 1);

        $indegree[$requests[$index][0]]++;
        $indegree[$requests[$index][1]]--;
        
        $this->maxRequest($requests, $indegree, $n, $index + 1, $count);
    }
}

