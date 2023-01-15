<?php

class Solution
{

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms)
    {
        $arVisited = array_fill(0, count($rooms), false);
        $arVisited[0] = true;
        $arKeys[] = 0;

        while (!empty($arKeys)) {
            $currentKey = array_pop($arKeys);
            foreach ($rooms[$currentKey] as $key) {
                if (!$arVisited[$key]) {
                    $arVisited[$key] = true;
                    $arKeys[] = $key;
                }
            }
        }
        foreach ($arVisited as $visitedRoom) {
            if (!$visitedRoom) {
                return false;
            }
        }

        return true;
    }

}
