<?php

class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) 
    {
        if (count($matrix) == 0) {
            return 0;
        }

        $heights = [];
        $maxArea = -1;
        $height = count($matrix);
        $width = count($matrix[0]);
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                if ($matrix[$i][$j] == '0' ) {
                    $heights[$j] = 0;
                } else {
                    $heights[$j]++;
                }
            }            
            $area = $this->yourLeetCode84Method($heights);
            $maxArea = max($maxArea, $area);
        }

        return $maxArea;
    }

    protected function yourLeetCode84Method(array $heights) 
    {
        if (count($heights) == 0) {
            return 0;
        }
        $lessFromLeft = []; 
        $lessFromRight = []; 
        $heightsCount = count($heights);
        $lessFromRight[$heightsCount - 1] = count($heights);
        $lessFromLeft[0] = -1;

        for ($i = 1; $i < $heightsCount; $i++) {
            $p = $i - 1;

            while ($p >= 0 && $heights[$p] >= $heights[$i]) {
                $p = $lessFromLeft[$p];
            }
            $lessFromLeft[$i] = $p;
        }

        for ($i = $heightsCount - 2; $i >= 0; $i--) {
            $p = $i + 1;

            while ($p < $heightsCount && $heights[$p] >= $heights[$i]) {
                $p = $lessFromRight[$p];
            }
            $lessFromRight[$i] = $p;
        }

        $maxArea = 0;
        for ($i = 0; $i < $heightsCount; $i++) {
            $maxArea = max(
                $maxArea, 
                $heights[$i] * ($lessFromRight[$i] - $lessFromLeft[$i] - 1)
            );
        }

        return $maxArea;
    }
}

