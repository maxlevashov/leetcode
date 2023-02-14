<?php

class Solution
{

    protected $wordCount = [];
    protected $wordLength = 0;
    protected $substringSize = 0;
    protected $k = 0;

    protected function check($i, $s)
    {
        $remaining = $this->wordCount;
        $wordsUsed = 0;

        for ($j = $i; $j < $i + $this->substringSize; $j += $this->wordLength) {
            $sub = substr($s, $j, $this->wordLength);

            if ($remaining[$sub] != 0) {
                $remaining[$sub] = $remaining[$sub] - 1;
                $wordsUsed++;
            } else {
                break;
            }
        }

        return $wordsUsed == $this->k;
    }

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words)
    {
        $n = strlen($s);
        $this->k = count($words);
        $this->wordLength = strlen($words[0]);
        $this->substringSize = $this->wordLength * $this->k;

        foreach ($words as $word) {
            $this->wordCount[$word] = $this->wordCount[$word] + 1;
        }

        $answer = [];
        for ($i = 0; $i < $n - $this->substringSize + 1; $i++) {
            if ($this->check($i, $s)) {
                $answer[] = $i;
            }
        }

        return $answer;
    }

}
