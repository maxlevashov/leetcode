<?php

class BookMyShow 
{

    protected $m = 0;
    protected $n;
    protected $segmentTree = [];

    /**
     * @param Integer $n
     * @param Integer $m
     */
    function __construct($n, $m) 
    {
        $this->n = $n;
        $this->m = $m;

        $this->build(0, 0, $n - 1);
    }
  
    /**
     * @param Integer $k
     * @param Integer $maxRow
     * @return Integer[]
     */
    function gather($k, $maxRow) 
    {
        
        $ret = $this->queryMax(0, 0, $this->n - 1, $k, $maxRow);
        if (!empty($ret)) {
            $this->updateMax(0, 0, $this->n - 1, $ret[0], $k);
        }
            
        return $ret;
    }
  
    /**
     * @param Integer $k
     * @param Integer $maxRow
     * @return Boolean
     */
    function scatter($k, $maxRow) 
    {
        $cnt = $this->querySum(0, 0, $this->n - 1, $maxRow);
        $ret = $cnt >= $k;
        if ($ret) {
            $this->updateSum(0, 0, $this->n - 1, $k, $maxRow);
        }

        return $ret;
    }

    protected function build($i, $p, $q) 
    {
        if ($p == $q) {
            $this->segmentTree[$i] = [$this->m, $this->m];
            return;
        }
        $r = intval(($p + $q) / 2);
        $this->segmentTree[$i] = [$this->m, ($q - $p + 1) * $this->m];
        $this->build(2 * $i + 1, $p, $r);
        $this->build(2 * $i + 2, $r + 1, $q);
    }

    protected function queryMax($i, $p, $q, $k, $maxRow) 
    {
        if (
            $p > $maxRow 
            || $this->segmentTree[$i][0] < $k
        ) {
            return [];
        }

        if ($p == $q) {
            return [$p, (int)($this->m - $this->segmentTree[$i][0])];
        }
        $r = intval(($p + $q) / 2);
        $ret = $this->queryMax(2 * $i + 1, $p, $r, $k, $maxRow);
        if (!empty($ret)) {
            return $ret;
        }

        return $this->queryMax(2 * $i + 2, $r + 1, $q, $k, $maxRow);
    }

    protected function updateMax($i, $p, $q, $row, $k) 
    {
        if ($p > $row || $q < $row) {
            return;
        }
        if ($p == $q) {
            $this->segmentTree[$i][0] -= $k;
            $this->segmentTree[$i][1] -= $k;
            
            return;
        }
        $r = intval(($p + $q) / 2);
        $this->segmentTree[$i][1] -= $k;
        $this->updateMax(2 * $i + 1, $p, $r, $row, $k);
        $this->updateMax(2 * $i + 2, $r + 1, $q, $row, $k);
        $this->segmentTree[$i][0] = max(
            $this->segmentTree[2 * $i + 1][0], 
            $this->segmentTree[2 * $i + 2][0]
        );
    }

    protected function querySum($i, $p, $q, $maxRow) 
    {
        if ($p > $maxRow) {
            return 0;
        }
        if ($q <= $maxRow) {
            return $this->segmentTree[$i][1];
        }
        $r = intval(($p + $q) / 2);

        return $this->querySum(2 * $i + 1, $p, $r, $maxRow) 
            + $this->querySum(2 * $i + 2, $r + 1, $q, $maxRow);
    }

    protected function updateSum($i, $p, $q, $k, $maxRow) 
    {
        if ($p > $maxRow) {
            return;
        }
        if ($p == $q) {
            $this->segmentTree[$i][0] -= $k;
            $this->segmentTree[$i][1] -= $k;
            
            return;
        }
        $r = intval(($p + $q) / 2);
        $this->segmentTree[$i][1] -= $k;
        if ($r + 1 > $maxRow || $this->segmentTree[2 * $i + 1][1] >= $k) {
            $this->updateSum(2 * $i + 1, $p, $r, $k, $maxRow);
        } else {
            $k -= $this->segmentTree[2 * $i + 1][1];
            $this->updateSum(2 * $i + 1, $p, $r, $this->segmentTree[2 * $i + 1][1], $maxRow);
            
            $this->updateSum(2 * $i + 2, $r + 1, $q, $k, $maxRow);
        }
        $this->segmentTree[$i][0] = max(
            $this->segmentTree[2 * $i + 1][0], 
            $this->segmentTree[2 * $i + 2][0]
        );
    }
}

/**
 * Your BookMyShow object will be instantiated and called as such:
 * $obj = BookMyShow($n, $m);
 * $ret_1 = $obj->gather($k, $maxRow);
 * $ret_2 = $obj->scatter($k, $maxRow);
 */

