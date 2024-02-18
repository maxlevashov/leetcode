<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Boolean
     */
    function isToeplitzMatrix($matrix) {  
        $result = true;
        foreach ($matrix as $keyRow => $arRow) {
            foreach ($arRow as $key => $item) {
                if ($keyRow == 0 || $key == 0) {
                    $i = $keyRow + 1;
                    $k = $key + 1;
                    while (true) {
                        if (!isset($matrix[$i][$k])) {
                            break;
                        }
                        
                        if ($item != $matrix[$i][$k]) {
                            $result = false;
                            break 3;
                        }
                        $i++;
                        $k++;
                    }
                }
            }
        }
        
        return $result;
    }
}
