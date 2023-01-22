<?php

class Solution
{

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s)
    {
        $arResult = [];
        $currentList = [];
        $this->dfs($arResult, $s, 0, $currentList);

        return $arResult;
    }

    protected function dfs(&$arResult, &$s, $start, &$currentList)
    {
        if ($start >= strlen($s)) {
            $arResult[] = $currentList;
        }
        for ($end = $start; $end < strlen($s); $end++) {
            if ($this->isPalindrome($s, $start, $end)) {
                $currentList[] = substr($s, $start, $end - $start + 1);
                $this->dfs($arResult, $s, $end + 1, $currentList);
                array_pop($currentList);
            }
        }
    }

    protected function isPalindrome(&$s, $low, $high)
    {
        while ($low < $high) {
            if ($s[$low++] !== $s[$high--]) {
                return false;
            }
        }

        return true;
    }

}
