<?php

class Solution 
{

    /**
     * @param String[] $strs
     * @return Integer
     */
    function numSimilarGroups($strs) 
    {
        $visited = array_fill(0, count($strs), false);
        $result = 0;
        
        for ($i = 0; $i < count($strs); $i++) {
            if (!$visited[$i]) {
                $result++; 
                $this->dfs($strs, $visited, $i);
            }
        }

        return $result;
    }

    private function dfs($strs, &$visited, $index) 
    {  
        $visited[$index] = true; 
        $curr = $strs[$index];
        
        for ($i = 0; $i < count($strs); $i++) {     
            if (!$visited[$i] && $this->isSimilar($curr, $strs[$i])) 
            {
                $this->dfs($strs, $visited, $i);
            }      
        }
    }
    
    
    private function isSimilar(string $string1, string $string2) 
    {
        $diff = 0;
        for ($i = 0; $i < strlen($string1); $i++) {
            if ($string1[$i] != $string2[$i]) {
                $diff++;
            }
        }
        
        return ($diff == 2 || $diff == 0); 
    }
}



    


