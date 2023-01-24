<?php

class Solution
{

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function snakesAndLadders($board)
    {
        $boardCount = count($board);
        $arCells = [[]];
        $label = 1;
        $arColumns = [];
        for ($i = 0; $i < $boardCount; $i++) {
            $arColumns[$i] = $i;
        }
        for ($row = $boardCount - 1; $row >= 0; $row--) {
            foreach ($arColumns as $column) {
                $arCells[$label++] = [$row, $column];
            }
            $arColumns = array_reverse($arColumns);
        }
        
        $arDist = array_fill(0, $boardCount * $boardCount + 1, -1);
        $queue = [1];
        $arDist[1] = 0;
        while (!empty($queue)) {
            $curr = array_shift($queue);
            for (
                    $next = $curr + 1;
                    $next <= min($curr + 6, $boardCount * $boardCount);
                    $next++
            ) {
                $row = $arCells[$next][0];
                $column = $arCells[$next][1];
                $destination = $board[$row][$column] != -1 ? $board[$row][$column] : $next;
                if ($arDist[$destination] == -1) {
                    $arDist[$destination] = $arDist[$curr] + 1;
                    $queue[] = $destination;
                }
            }
        }

        return $arDist[$boardCount * $boardCount];
    }

}
