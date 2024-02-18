<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $maxResult = 0;
        $stack = [-1];

        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                $stack[] = $i;
            } else {
                array_pop($stack);
                if (empty($stack)) {
                    $stack[] = $i;
                } else {
                    $maxResult = max(
                            $maxResult,
                            $i - $stack[count($stack) - 1]
                    );
                }
            }
        }

        return $maxResult;
    }

}
