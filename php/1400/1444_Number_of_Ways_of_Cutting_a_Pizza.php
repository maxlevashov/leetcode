<?php

class Solution 
{

    protected int $height = 0;
    protected int $width = 0;

    /**
     * @param String[] $pizza
     * @param Integer $k
     * @return Integer
     */
    function ways($pizza, $k) 
    {
        $this->height = count($pizza);
        $this->width = strlen($pizza[0]);
        $dp = array_fill(0, $k, 
            array_fill(0, $this->height, 
                array_fill(0, $this->width,  -1)
            )
        );
        $preSum = array_fill(0, $this->height + 1, 
            array_fill(0, $this->width + 1, 0)
        );
   
        for ($r = $this->height- 1; $r >= 0; $r--) {
            for ($c = $this->width - 1; $c >= 0; $c--) {
                $preSum[$r][$c] = 
                    $preSum[$r][$c + 1] 
                    + $preSum[$r + 1][$c] 
                    - $preSum[$r + 1][$c + 1] 
                    + ($pizza[$r][$c] == 'A' ? 1 : 0);
            }
        }

        return $this->dfs($k - 1, 0, 0, $dp, $preSum);
    }
    
    protected function dfs($k, $r, $c, &$dp, &$preSum) 
    {
        if ($preSum[$r][$c] == 0) {
            return 0;
        }
        if ($k == 0) {
            return 1;
        }
        if ($dp[$k][$r][$c] != -1) {
            return $dp[$k][$r][$c];
        }
        $result = 0;
    
        for ($nr = $r + 1; $nr < $this->height; $nr++) { 
            if ($preSum[$r][$c] - $preSum[$nr][$c] > 0) {
                $result = ($result + $this->dfs($k - 1, $nr, $c, $dp, $preSum)) % 1000000007;
            }
        }
  
        for ($nc = $c + 1; $nc < $this->width; $nc++) {
            if ($preSum[$r][$c] - $preSum[$r][$nc] > 0) {
                $result = ($result + $this->dfs($k - 1, $r, $nc, $dp, $preSum)) % 1000000007;
            }
        }

        return $dp[$k][$r][$c] = $result;
    
    }
}
