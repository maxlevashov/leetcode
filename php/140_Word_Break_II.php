<?php

class Solution 
{

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) 
    {
        $set = [];
        $result = [];
        foreach ($wordDict as $word) {
            $set[$word] = true;
        }
        $curr = '';
        $this->dfs(0, $s, $curr, $set, $result);

        return $result;
    }

    protected function dfs(
        int $ind,
        string $s,
        string $curr,
        array $set,
        array &$result
    ) {
        if ($ind == strlen($s)) {
            $curr = substr($curr, 0, -1); 
            $result[] = $curr;
        }
        $str = '';

        for ($i = $ind; $i < strlen($s); $i++) {
            $str .= $s[$i];
            if (isset($set[$str])) {
                $this->dfs($i + 1, $s, $curr . $str . " ", $set, $result);
            }
        }
    }
}

