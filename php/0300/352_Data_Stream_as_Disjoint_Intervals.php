<?php

class SummaryRanges
{

    protected $values = [];

    /**
     */
    function __construct()
    {
        
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function addNum($value)
    {
        $this->values[$value] = false;
    }

    /**
     * @return Integer[][]
     */
    function getIntervals()
    {
        if (empty($this->values)) {
            return $this->values;
        }

        ksort($this->values);
        $intervals = [];
        $left = -1;
        $right = -1;
        foreach ($this->values as $key => $value) {
            if ($left < 0) {
                $left = $right = $key;
            } elseif ($key == $right + 1) {
                $right = $key;
            } else {
                $intervals[] = [$left, $right];
                $left = $right = $key;
            }
        }
        $intervals[] = [$left, $right];

        return $intervals;
    }

}

/**
 * Your SummaryRanges object will be instantiated and called as such:
 * $obj = SummaryRanges();
 * $obj->addNum($value);
 * $ret_2 = $obj->getIntervals();
 */

