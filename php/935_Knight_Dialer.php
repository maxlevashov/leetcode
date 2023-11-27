<?php

class Solution 
{

    protected array $memo = [];
    protected int $n = 0;
    const MOD = 1e9 + 7;
    protected array $jumps = [
        [4, 6],
        [6, 8],
        [7, 9],
        [4, 8],
        [3, 9, 0],
        [],
        [1, 7, 0],
        [2, 6],
        [1, 3],
        [2, 4],
    ];
    

    /**
     * @param Integer $n
     * @return Integer
     */
    function knightDialer($n) 
    {
        $this->n = $n;
        $this->memo = array_fill(0, $n + 1, array_fill(0, 10, 0));
        $ans = 0;
        for ($square = 0; $square < 10; $square++) {
            $ans = ($ans + $this->dp($n - 1, $square)) % self::MOD;
        }
        
        return $ans;
    }

    protected function dp($remain, $square) 
    {
        if ($remain == 0) {
            return 1;
        }
        
        if ($this->memo[$remain][$square] != 0) {
            return $this->memo[$remain][$square];
        }
        
        $ans = 0;
        foreach ($this->jumps[$square] as $nextSquare) {
            $ans = ($ans + $this->dp($remain - 1, $nextSquare)) % self::MOD;
        }
        
        $this->memo[$remain][$square] = $ans;
        return $ans;
    }
}

