<?php

class Solution
{

    /**
     * @param String[] $ideas
     * @return Integer
     */
    function distinctNames($ideas)
    {
        $initialGroup = array_fill(0, 26, []);
        foreach ($ideas as $idea) {
            $initialGroup[ord($idea[0]) - ord('a')][] = substr($idea, 1);
        }

        $answer = 0;
        for ($i = 0; $i < 25; ++$i) {
            for ($j = $i + 1; $j < 26; ++$j) {
                $numOfMutual = count(
                        array_intersect($initialGroup[$i], $initialGroup[$j])
                );

                $answer += 2 * (count($initialGroup[$i]) - $numOfMutual)
                    * (count($initialGroup[$j]) - $numOfMutual);
            }
        }
        return $answer;
    }

}
