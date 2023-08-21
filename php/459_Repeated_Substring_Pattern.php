<?php

class Solution 
{

    /**
     * @param String $s
     * @return Boolean
     */
    function repeatedSubstringPattern($s) 
    
        $doubled = $s . $s;
        
        $sub = substr($doubled, 1, strlen($doubled) - 2);

        return str_contains($sub, $s);
    }
}

