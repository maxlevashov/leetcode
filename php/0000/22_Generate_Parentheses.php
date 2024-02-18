<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $return = [];
        if ($n == 0) {
            $return[] = '';
        } else {
            for ($i = 0; $i < $n; $i++) {
                foreach ($this->generateParenthesis($i) as $left) {
                    foreach ($this->generateParenthesis($n - 1 - $i) as $right) {
                        $return[] = "(" . $left . ')' . $right;
                    }
                }
            }
        }

        return $return;
    }

}
