<?php

/** class Solution */
class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $count = 0;
        foreach ($grid as $keyRow => $arRow) {
            foreach ($arRow as $keyCell => $cell) {
                if ($grid[$keyRow][$keyCell] == '1') {
                    $count += 1;
                    $this->BFS($grid, $keyRow, $keyCell);
                }
            }
        }

        return $count;
    }

    /**
     * @param String[][] &$grid
     * @param Integer $keyRow
     * @param Integer $keyCell
     */
    protected function BFS(&$grid, $keyRow, $keyCell) 
    {
        if (
            $keyRow < 0
            || $keyRow >= count($grid)
            || $keyCell < 0
            || $keyCell >= count($grid[$keyRow])
            || $grid[$keyRow][$keyCell] == '0'
        ) {
            return;
        }

        $grid[$keyRow][$keyCell] = '0';
        
        $this->BFS($grid, $keyRow + 1, $keyCell);
        $this->BFS($grid, $keyRow - 1, $keyCell);
        $this->BFS($grid, $keyRow, $keyCell + 1);
        $this->BFS($grid, $keyRow, $keyCell - 1);
    }
}

