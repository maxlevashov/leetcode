<?php

class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return String[][]
     */
    function findLadders($beginWord, $endWord, $wordList) 
    {
        $n = count($wordList);
        $start = -1;
        $end = -1;
        $ans = [];
        for ($i = 0; $i < $n; $i++) {
            if ($wordList[$i] == $beginWord) {
                $start = $i;
            }
            if ($wordList[$i] == $endWord) {
                $end = $i;
            }       
        }
        
        if ($end == -1) {
            return $ans;
        }
        
        if ($start == -1) {
            array_unshift($wordList, $beginWord);
            $start = 0;
            $end++;
            $n++;
        }

        $g = array_fill(0, $n, []);
        $paths = [];
    
        $parent = array_fill(0, $n, 0);
        $path = [];
        
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($this->able($wordList[$i], $wordList[$j])) {
                    $g[$i][] = $j;
                    $g[$j][] = $i;
                }
            }
        }
        
        $this->bfs($g, $parent, $n, $start, $end); 
        
        $this->shortestPaths($paths, $path, $parent, $end);
        foreach ($paths as $u) {
            $now = [];
            for ($i = 0; $i < count($u) - 1; $i++) {
                $now[] = $wordList[$u[$i]];
            }
            $now = array_reverse($now);
            $now[] = $wordList[$end];
            $ans[] = $now;
        }

        return $ans;
    }

    protected function able(string $s, string $t) 
    {
        $c = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $c += ($s[$i] != $t[$i]);
        }

        return $c == 1;
    }

    protected function bfs(&$g, &$parent, $n, $start, $end) 
    {
        $dist = array_fill(0, $n, 1005);
        $queue = new SplQueue();
        $queue->enqueue($start);
        $parent[$start] = [-1];
        $dist[$start] = 0;
        while (!$queue->isEmpty()) {
            $x = $queue->dequeue();
            foreach ($g[$x] as $u) {
                if ($dist[$u] > $dist[$x] + 1) {
                    $dist[$u] = $dist[$x] + 1;
                    $queue->enqueue($u);
                    unset($parent[$u]);
                    $parent[$u][] = $x;
                } elseif ($dist[$u] == $dist[$x] + 1) {
                    $parent[$u][] = $x;
                }
            }
        }
    }

    protected function shortestPaths(&$paths, &$path, $parent, $node) 
    {
        if ($node == -1) {
            $paths[] = $path;
            return ;
        }
        foreach ($parent[$node] as $u) {
            $path[] = $u;
            $this->shortestPaths($paths, $path, $parent, $u);
            array_pop($path);
        }
    }

}

