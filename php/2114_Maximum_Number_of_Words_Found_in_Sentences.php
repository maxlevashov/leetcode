<?php

class Solution
{

    /**
     * @param String[] $sentences
     * @return Integer
     */
    function mostWordsFound($sentences)
    {
        $result = 0;

        foreach ($sentences as $sentence) {
            $result = max($result, substr_count($sentence, ' ') + 1);
        }

        return $result;
    }

}
