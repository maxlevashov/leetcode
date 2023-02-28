<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestEvenMultiple($n)
    {

        return $n & 1 ? $n * 2 : $n;
    }
}