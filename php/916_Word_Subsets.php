<?php

class Solution
{

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return String[]
     */
    function wordSubsets($words1, $words2)
    {
        $result = [];
        $maxWord2Frequencies = array_fill(0, 26, 0);
        foreach ($words2 as $word) {
            $charFrequencies = $this->getCharFrequencies($word);
            for ($i = 0; $i < 26; $i++) {
                $maxWord2Frequencies[$i] = max($maxWord2Frequencies[$i], $charFrequencies[$i]);
            }
        }
        foreach ($words1 as $word) {
            $charFrequencies = $this->getCharFrequencies($word);
            $isValid = true;
            for ($i = 0; $i < 26; $i++) {
                if ($maxWord2Frequencies[$i] > $charFrequencies[$i]) {
                    $isValid = false;
                    break;
                }
            }
            if ($isValid) {
                $result[] = $word;
            }
        }

        return $result;
    }

    protected function getCharFrequencies($s)
    {
        $result = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($s); $i++) {
            $result[ord($s[$i]) - ord('a')]++;
        }

        return $result;
    }

}
