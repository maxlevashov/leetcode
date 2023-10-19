<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) 
    {
        return strcmp($this->backspace($s), $this->backspace($t)) == 0;
    }

    protected function backspace($str) 
    {
        $result = '';
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '#') {
                $result = substr($result, 0, -1);
            } else {
                $result .= $str[$i];
            }
        }
        return $result;
    }
}

