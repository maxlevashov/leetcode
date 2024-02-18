<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n)
    {
        $n--;
        $result = '1';

        while ($n--) {
            $result = $this->enumeration($result);
        }

        return $result;
    }

    protected function enumeration($string)
    {
        $nextString = '';
        $i = 0;
        while ($i < strlen($string)) {
            $currentChar = $string[$i];
            $count = 1;
            $i++;

            while ($string[$i] == $currentChar) {
                $count++;
                $i++;
            }

            $nextString .= strval($count);
            $nextString .= $currentChar;
        }

        return $nextString;
    }

}
