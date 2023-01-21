<?php

class Solution
{

    private function valid($s, $start, $length)
    {
        return $length == 1 ||
                ($s[$start] != '0' && ($length < 3 ||
                substr($s, $start, $length) <= '255')
                );
    }

    private function helper($s, $startIndex, &$dots, &$ans)
    {
        $remainingLength = strlen($s) - $startIndex;
        $remainingNumberOfIntegers = 4 - count($dots);
        if ($remainingLength > $remainingNumberOfIntegers * 3 ||
                $remainingLength < $remainingNumberOfIntegers) {
            return;
        }
        if (count($dots) == 3) {
            if ($this->valid($s, $startIndex, $remainingLength)) {
                $sb = '';
                $last = 0;
                foreach ($dots as $dot) {
                    $sb .= substr($s, $last, $dot);
                    $last += $dot;
                    $sb .= '.';
                }
                $sb .= substr($s, $startIndex);
                $ans[] = $sb;
            }
            return;
        }
        for ($curPos = 1; $curPos <= 3 && $curPos <= $remainingLength; ++$curPos) {
            $dots[] = $curPos;
            if ($this->valid($s, $startIndex, $curPos)) {
                $this->helper($s, $startIndex + $curPos, $dots, $ans);
            }

            array_pop($dots);
        }
    }

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        $dots = [];
        $result = [];
        $this->helper($s, 0, $dots, $result);
        return $result;
    }

}
