<?php

class Solution 
{

    /**
     * @param Integer[][] $dungeon
     * @return Integer
     */
    function calculateMinimumHP($dungeon) 
    {
        $height = count($dungeon);
        $width = count($dungeon[0]);
        $memo = array_fill(0, $height + 1, array_fill(0, $width + 1, PHP_INT_MAX));
        $memo[$height][$width - 1] = 1;
        $memo[$height - 1][$width ] = 1;

        for ($i = $height - 1; $i >= 0; $i--) {
            for ($j = $width - 1; $j >= 0; $j--) {
                $need = min($memo[$i + 1][$j], $memo[$i][$j + 1]) - $dungeon[$i][$j];
                $memo[$i][$j] = $need <= 0 ? 1 : $need;
            }
        }

        return $memo[0][0];
    }
}

