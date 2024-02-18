<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function maxNumEdgesToRemove($n, $edges) 
    {
        usort($edges, function($a, $b) {
            return $a[0] < $b[0];
        });

        $dsuAlice = new Dsu($n + 1);
        $dsuBob = new Dsu($n + 1);
        $removedEdge = 0;
        $aliceEdges = 0;
        $bobEdges = 0;
        
        foreach ($edges as $edge) {
            if ($edge[0] == 3) {
                if ($dsuAlice->union($edge[1], $edge[2])) { 
                    $dsuBob->union($edge[1], $edge[2]);
                    $aliceEdges++;
                    $bobEdges++;
                } else {
                    $removedEdge++;
                }
            } elseif ($edge[0] == 2) { 
                if ($dsuBob->union($edge[1], $edge[2])) {
                    $bobEdges++;
                } else {
                    $removedEdge++;
                }
            } else { 
                if ($dsuAlice->union($edge[1], $edge[2])) {
                    $aliceEdges++;
                } else {
                    $removedEdge++;
                }
            }
        }

        return ($bobEdges == $n - 1 && $aliceEdges == $n - 1) 
            ? $removedEdge 
            : -1;

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
            return true;
        }
        return false;
    }
}

