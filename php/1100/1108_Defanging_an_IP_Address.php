<?php

class Solution {

    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address) {
        return str_replace('.', '[.]', $address);

        // $result = '';
        // $i = 0;
        // while ($i < strlen($address)) {
        //     $result .= $address[$i] == '.' 
        //         ? '[.]' : $address[$i];
        //     $i++;
        // }

        // return $result;
    }
}

