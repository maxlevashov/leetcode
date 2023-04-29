<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $edgeList
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function distanceLimitedPathsExist($n, &$edgeList, &$queries) 
    {
        $dsu = new Dsu($n);
        for ($i = 0; $i < count($queries); $i++) {
            $queries[$i][] = $i;
        }

        usort($queries, function($a, $b) {
            return $a[2] > $b[2];
        });
        usort($edgeList, function($c, $d) {
            return $c[2] > $d[2];
        });

        $i = 0;
        $result = array_fill(0, count($queries), false);
        foreach ($queries as $query) {           
            while (
                $i < count($edgeList) 
                && $edgeList[$i][2] < $query[2]
            ) {
                $dsu->union($edgeList[$i][0], $edgeList[$i][1]);
                $i++;
            }
            
            if ($dsu->find($query[0]) == $dsu->find($query[1])) {
                $result[$query[3]] = true;
            }
        }
        
        return $result;
    }
}

class Dsu 
{

    protected $parent = [];
    protected $rank = [];

    public function __construct(int $n) 
    {
        $this->rank = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
        }
    }

    public function find(int $x) 
    {
        return $this->parent[$x] = $this->parent[$x] == $x 
            ? $x 
            : $this->find($this->parent[$x]);
    }

    public function union(int $x, int $y) 
    {
        $xset = $this->find($x);
        $yset = $this->find($y);
        if ($xset != $yset) {
            $this->rank[$xset] < $this->rank[$yset] 
                ? $this->parent[$xset] = $yset 
                : $this->parent[$yset] = $xset;
            $this->rank[$xset] += $this->rank[$xset] == $this->rank[$yset];
        }

    }
};



