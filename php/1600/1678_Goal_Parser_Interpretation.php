<?php

class Solution
{

    /**
     * @param String $command
     * @return String
     */
    function interpret($command)
    {
        $result = '';

        for ($i = 0; $i < strlen($command); $i++) {

            if ($command[$i] == '(' && $command[$i + 1] == ')') {
                $result .= 'o';
            } elseif ($command[$i] == '(' || $command[$i] == ')') {
                continue;
            } else {
                $result .= $command[$i];
            }
        }

        return $result;
    }

}
