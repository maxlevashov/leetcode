<?php

class Solution {

     /** 
      * @var $memo 
      */
    public $memo = [
        0 => 0,
        1 => 1,
    ];

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->fib($n - 1) + $this->fib($n - 2);
        }

        return $this->memo[$n];
    }
}
