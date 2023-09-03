<?php

class Solution {

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words) {
        $trie = new Node;
        foreach ($words as $word) {
            $this->addWord($trie, $word);
        }
        $res = [];
        for ($i = 0; $i < count($board); ++$i) {
            for ($j = 0; $j < count($board[0]); ++$j) {
                $visited = array_fill(0, count($board), 
                    array_fill(0, count($board[0]), false));
                $this->dfs($board, $i, $j, $trie, $visited, $res);
            }
        }
        return $res;
    }

    protected function addWord($root, string $word) {
        $cur = $root;
        foreach (str_split($word) as $c) {
            $next = $cur->child[ord($c) - ord('a')];
            if (!$next) {
                $next = new Node;
                $cur->child[ord($c) - ord('a')] = $next;
            }
            $cur = $next;
        }
        $cur->word = $word;
    }
    
    
    protected function dfs(&$board, int $i, int $j, $trp, &$visited, &$res) {
        if ($i < 0 || $i > count($board) - 1 || $j < 0 || $j > count($board[0]) - 1
            || !$trp || $visited[$i][$j]) {
            return;
        }
        $tr = $trp->child[ord($board[$i][$j]) - ord('a')];
        if (!$tr) {
            return;
        }
        if (!empty($tr->word)) {
            $res[] = $tr->word;
            $tr->word = ''; 
        }
        $visited[$i][$j] = true;
        $this->dfs($board, $i - 1, $j, $tr, $visited, $res);
        $this->dfs($board, $i + 1, $j, $tr, $visited, $res);
        $this->dfs($board, $i, $j - 1, $tr, $visited, $res);
        $this->dfs($board, $i, $j + 1, $tr, $visited, $res);
        $visited[$i][$j] = false;
    }
}

class Node {
    public String $word;
    public $child = [];
    public function __construct() {
        for ($i = 0; $i < 26; ++$i) {
            $this->child[$i] = null;
        }
    }
};

