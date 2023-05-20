<?php

class Solution 
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList)
    {
        $set = array_flip($wordList);
        if (!isset($set[$endWord])) {
            return 0;
        } 
        
        $queue = new SplQueue();
        $queue->enqueue($beginWord);
        $visited = [];        
        $changes = 1;
        
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $word = $queue->dequeue();
                if ($word == $endWord) {
                    return $changes;
                }
                
                for ($j = 0; $j < strlen($word); $j++) {
                    for ($k = 0; $k < 26; $k++) {
                        $str = $word;
                        $str[$j] = chr(ord('a') + $k);
                        
                        if (isset($set[$str]) && !isset($visited[$str])) {
                            $queue->enqueue($str);
                            $visited[$str] = true;
                        }
                    }
                }
            }
            ++$changes;
        }
        return 0;
    }
}

