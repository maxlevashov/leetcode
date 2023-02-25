<?php

class Solution
{

    /**
     * @param String $password
     * @return Integer
     */
    function strongPasswordChecker($password)
    {
        $requiredChar = $this->getRequiredChar($password);
        $passwordLen = strlen($password);

        if ($passwordLen < 6) {
            return max($requiredChar, 6 - $passwordLen);
        }

        $replace = 0;
        $oned = 0;
        $twod = 0;

        for ($i = 0; $i < $passwordLen;) {
            $len = 1;
            while (
                $i + $len < $passwordLen 
                && $password[$i + $len] == $password[$i + $len - 1]
            ) {
                $len++;
            }
            if ($len >= 3) {
                $replace += intval($len / 3);
                if ($len % 3 == 0) {
                    $oned += 1;
                }
                if ($len % 3 == 1) {
                    $twod += 2;
                }
            }
            $i += $len;
        }

        if ($passwordLen <= 20) {
            return max($requiredChar, $replace);
        }

        $deleteCount = $passwordLen - 20;
        $replace -= min($deleteCount, $oned);
        $replace -= intval(min(max($deleteCount - $oned, 0), $twod) / 2);
        $replace -= intval(max($deleteCount - $oned - $twod, 0) / 3);

        return $deleteCount + max($requiredChar, $replace);
    }

    protected function getRequiredChar($str)
    {
        $lowercase = 1;
        $uppercase = 1;
        $digit = 1;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ctype_lower($str[$i])) {
                $lowercase = 0;
            } else if (ctype_upper($str[$i])) {
                $uppercase = 0;
            } else if (ctype_digit($str[$i])) {
                $digit = 0;
            }
        }

        return $lowercase + $uppercase + $digit;
    }

}
