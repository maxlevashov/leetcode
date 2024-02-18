<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[][]
     */
    function findCriticalAndPseudoCriticalEdges($n, $edges) 
    {
        $newEdges = $edges;
        $m = count($newEdges);
        for ($i = 0; $i < $m; $i++) {
            $newEdges[$i][] = $i;
        }

        usort($newEdges, fn($a, $b) =>
            $a[2] > $b[2]
        );

        $ufStd = new UnionFind($n);
        $stdWeight = 0;
        foreach ($newEdges as $edge) {
            if ($ufStd->unite($edge[0], $edge[1])) {
                $stdWeight += $edge[2];
            }
        }

        $results = array_fill(0, 2, []);
        for ($i = 0; $i < $m; $i++) {
            $ufIgnore = new UnionFind($n);
            $ignoreWeight = 0;
            for ($j = 0; $j < $m; $j++) {
                if (
                    $i != $j 
                    && $ufIgnore->unite($newEdges[$j][0], $newEdges[$j][1])
                ) {
                    $ignoreWeight += $newEdges[$j][2];
                }
            }

            if (
                $ufIgnore->maxSize < $n 
                || $ignoreWeight > $stdWeight
            ) {
                $results[0][] = $newEdges[$i][3];
            } else {
                $ufForce = new UnionFind($n);
                $ufForce->unite($newEdges[$i][0], $newEdges[$i][1]);
                $forceWeight = $newEdges[$i][2];
                for ($j = 0; $j < $m; $j++) {
                    if ($i != $j && $ufForce->unite($newEdges[$j][0], $newEdges[$j][1])) {
                        $forceWeight += $newEdges[$j][2];
                    }
                }

                if ($forceWeight == $stdWeight) {

                    $results[1][] = $newEdges[$i][3];
                }
            }
        }

        return $results;
    }
}

class UnionFind 
{
    public $parent = [];
    public $size = [];
    public $maxSize = 0;

    public function __construct(int $n) 
    {
        $this->parent = array_fill(0, $n, 0);
        $this->size = array_fill(0, $n, 1);
        $this->maxSize = 1;
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
        }
    }

    public function find(int $x) 
    {
        if ($x != $this->parent[$x]) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    public function unite(int $x, int $y) 
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);
        if ($rootX != $rootY) {
            if ($this->size[$rootX] < $this->$size[$rootY]) {
                $this->swap($rootX, $rootY);
            }
            $this->parent[$rootY] = $rootX;
            $this->size[$rootX] += $this->size[$rootY];
            $this->maxSize = max($this->maxSize, $this->size[$rootX]);
            return true;
        }
        return false;
    }

    protected function swap(&$a, &$b) {
        list($a, $b) = [$b, $a];
    }

}

