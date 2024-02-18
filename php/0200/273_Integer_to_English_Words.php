<?php

class Solution 
{

    const LESS_THAN_20 = ["", "One", "Two", "Three", "Four", "Five", 
          "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
          "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
    const TENS = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", 
            "Sixty", "Seventy", "Eighty", "Ninety"];
    const THOUSANDS = ["", "Thousand", "Million", "Billion"];

    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num) 
    {
        if ($num == 0) {
            return "Zero";
        }

        $i = 0;
        $words = '';
        
        while ($num > 0) {
            if ($num % 1000 != 0) {
                $words = $this->numberToWordsRec($num % 1000) 
                    . self::THOUSANDS[$i] . ' ' . $words;
            }
            $num /= 1000;
            $i++;
        }
        
        return trim($words);
    }

    protected function numberToWordsRec(int $num) 
    {
        if ($num == 0) {
            return '';
        } elseif ($num < 20) {
            return self::LESS_THAN_20[$num] . ' ';
        } elseif ($num < 100) {
            return self::TENS[$num / 10] . ' ' . $this->numberToWordsRec($num % 10);
        } 
        return self::LESS_THAN_20[$num / 100] . ' Hundred ' 
            . $this->numberToWordsRec($num % 100);
    }
}

