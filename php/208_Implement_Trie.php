<?php

class TrieNode
{

    public $isCompleteWord;
    public $children;

    public function __construct()
    {
        $this->isCompleteWord = false;
        $this->children = array_fill(0, 26, 0);
    }

}

class Trie
{

    protected $root = null;

    /**
     */
    function __construct()
    {
        $this->root = new TreeNode();
    }

    /**
     * @param String $word
     * @return NULL
     */
    function insert($word)
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $index = ord($word[$i]) - ord('a');
            if ($node->children[$index] == null) {
                $node->children[$index] = new TrieNode();
            }
            $node = $node->children[$index];
        }
        $node->isCompleteWord = true;
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $index = ord($word[$i]) - ord('a');
            if ($node->children[$index] == null) {
                return false;
            }
            $node = $node->children[$index];
        }
        return $node->isCompleteWord;
    }

    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix)
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $index = ord($prefix[$i]) - ord('a');
            if ($node->children[$index] == null) {
                return false;
            }
            $node = $node->children[$index];
        }
        return true;
    }

}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */

