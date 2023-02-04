<?php

class Solution {

    const CHARS_COUNT = 26;

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {
        if (strlen($s1) > strlen($s2)) {
            return false;
        }
        $s1map = array_fill(0, self::CHARS_COUNT, 0);
        $s2map = array_fill(0, self::CHARS_COUNT, 0);

        for ($i = 0; $i < strlen($s1); $i++) {
            $s1map[ord($s1[$i]) - ord('a')]++;
            $s2map[ord($s2[$i]) - ord('a')]++;
        }

        $count = 0;
        for ($i = 0; $i < self::CHARS_COUNT; $i++) {
            if ($s1map[$i] == $s2map[$i]) {
                $count++;
            }
        }

        for ($i = 0; $i < strlen($s2) - strlen($s1); $i++) {
            $right = ord($s2[$i + strlen($s1)]) - ord('a');
            $left = ord($s2[$i]) - ord('a');
            if ($count == self::CHARS_COUNT) {
                return true;
            }
            $s2map[$right]++;
            if ($s2map[$right] == $s1map[$right]) {
                $count++;
            } elseif ($s2map[$right] == $s1map[$right] + 1) {
                $count--;
            }
            $s2map[$left]--;
            if ($s2map[$left] == $s1map[$left]) {
                $count++;
            } elseif ($s2map[$left] == $s1map[$left] - 1) {
                $count--;
            }
        }

        return $count == self::CHARS_COUNT;
    }
}

