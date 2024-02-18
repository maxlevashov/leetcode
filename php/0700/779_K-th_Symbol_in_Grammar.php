<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function kthGrammar($n, $k) 
    {
        $count = count(explode('1', decbin($k - 1))) - 1;
        return $count % 2 == 0 ? 0 : 1;
    }
}

