<?php

class Solution {

      /**
     * @param String[] $words
     * @param Integer $maxWidth
     * @return String[]
     */
    function fullJustify($words, $maxWidth) 
    {
        $result = []; 
        $output = $words[0];

        for ($i = 1; $i < count($words); $i++) {
            if (strlen($output) + strlen($words[$i]) + 1 <= $maxWidth) {
              $output .= ' ' . $words[$i]; 
            } else{ 
                $output = $this->spaceJustifier($output, $maxWidth, 0);  
                $result[] = $output;
                $output = $words[$i]; 
            }
        }
        $output = $this->spaceJustifier($output, $maxWidth, 1);
        $result[] = $output; 

        return $result;
    }

    protected function spaceJustifier($str, $maxWidth, $isLast) 
    {
        if (strlen($str) == $maxWidth) {
            return $str;
        }
        
        $spacesInString = 0; 
        for ($i = 0; $i < strlen($str); $i++){
            if ($str[$i] == ' ') {
                $spacesInString++;
            }
        }
        $spacesToBeInserted = $maxWidth - strlen($str);  

        if ($spacesInString == 0 || $isLast == 1) { 
            $str .= str_repeat(' ', $spacesToBeInserted);               
            return $str;
        }
        $eachSlot = $spacesToBeInserted / $spacesInString; 
        $leftOverSpace = $spacesToBeInserted % $spacesInString; 

        for ($i = 0; $i < strlen($str); $i++){
            if ($str[$i] == ' ' && ($eachSlot > 0 || $leftOverSpace > 0)){ 
                $noOfSpaces = $eachSlot + (($leftOverSpace--) > 0 ? 1 : 0);
                $str = substr($str, 0, $i) . str_repeat(' ', $noOfSpaces). substr($str, $i);
                $i += $noOfSpaces;   
            }
            
        }
        return $str;
    }
}

