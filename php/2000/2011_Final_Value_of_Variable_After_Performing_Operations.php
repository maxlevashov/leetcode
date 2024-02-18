<?php

class Solution {

    const MAP = [
        '--X' => -1,
        'X--' => -1,
        '++X' => 1,
        'X++' => 1,
    ];

    /**
     * @param String[] $operations
     * @return Integer
     */
    function finalValueAfterOperations($operations) {
        $result = 0;
        
        foreach ($operations as $item) {
            $result += self::MAP[$item];
        }

        return $result;
    }
}
