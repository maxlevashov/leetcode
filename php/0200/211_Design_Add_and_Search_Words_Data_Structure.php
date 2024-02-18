<?php

class TrieNode
{

    public $isCompleteWord = false;
    public $children = [];

    public function __construct()
    {
        
    }

}


class WordDictionary
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
    function addWord($word)
    {
        $node = $this->root;
        $strlenWord = strlen($word);
        for ($i = 0; $i < $strlenWord; $i++) {
            $index = ord($word[$i]) - ord('a');
            if (!isset($node->children[$index])) {
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
        return $this->searchRecursive($word, $this->root);
    }

    protected function searchRecursive($word, $node)
    {
        $strlenWord = strlen($word);
        for ($i = 0; $i < $strlenWord; $i++) {
            $currentChar = $word[$i];
            if ($currentChar == '.') {
                foreach ($node->children as $child) {
                    if ($this->searchRecursive(substr($word, $i + 1), $child)) {
                        return true;
                    }
                }
                return false;
            }
            $index = ord($currentChar) - ord('a');
            if (!isset($node->children[$index])) {
                return false;
            }

            $node = $node->children[$index];
        }

        return $node->isCompleteWord;
    }

}

/**
 * Your WordDictionary object will be instantiated and called as such:
 * $obj = WordDictionary();
 * $obj->addWord($word);
 * $ret_2 = $obj->search($word);
 */

