<?php

class Solution
{

    /**
     * @param String[] $chars
     * @return Integer
     */
    function compress(&$chars)
    {
        $countChars = count($chars);
        if ($countChars == 1) {
            return $countChars;
        }

        $i = 0;
        $j = 0;
        while ($i < $countChars) {
            $count = 1;
            while (
                $i < $countChars - 1 
                && $chars[$i] == $chars[$i + 1]
            ) {
                $count++;
                $i++;
            }

            $chars[$j++] = $chars[$i++];
            if ($count > 1) {
                $countStr = strval($count);
                for ($k = 0; $k < strlen($countStr); $k++) {
                    $chars[$j++] = $countStr[$k];
                }
            }
        }

        return $j;
    }

}
