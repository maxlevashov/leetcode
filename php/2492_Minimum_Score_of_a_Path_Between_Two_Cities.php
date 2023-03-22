<?php

class Solution {

    protected $graph = [];
    protected $minScore = 0;
    protected $visited = [];
    protected $queue = null;

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function minScore($n, $roads) {
        
        $this->init($roads);
        
        $this->calculateMinScore();

        return $this->minScore;
    }

    protected function init($roads) {
        foreach ($roads as $road) {
            $vertex1 = $road[0];
            $vertex2 = $road[1];
            $weight = $road[2];
            $this->graph[$vertex1][$vertex2] = $weight;
            $this->graph[$vertex2][$vertex1] = $weight;
        }
        $this->minScore = PHP_INT_MAX;
        $this->visited = [];
        $this->queue = new SplQueue();
        $this->queue->enqueue(1);
    }

    protected function calculateMinScore() {
        while (!$this->queue->isEmpty()) {
            $node = $this->queue->dequeue();
            foreach ($this->graph[$node] as $adj => $score) {
                if (!isset($this->visited[$adj])) {
                    $this->queue->enqueue($adj);
                    $this->visited[$adj] = false;
                }
                $this->minScore = min($this->minScore, $score);          
            }
        }
    }
    
}
