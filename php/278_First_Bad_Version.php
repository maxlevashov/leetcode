<?php

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left = 0;
        $right = $n; 
        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($this->isBadVersion($mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        if ($left == $right && $this->isBadVersion($left)) {
            return $left;
        }

        return -1;
    }
}
