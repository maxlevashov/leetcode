class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function rangeSum($nums, $n, $left, $right) 
    {
        $mod = 1e9 + 7;
        $result =
            (
                $this->sumOfFirstK($nums, $n, $right) 
                - $this->sumOfFirstK($nums, $n, $left - 1)
            ) % $mod;
        return ($result + $mod) % $mod;
    }

    private function countAndSum(&$nums, int $n, int $target) 
    {
        $count = 0;
        $currentSum = 0;
        $totalSum = 0;
        $windowSum = 0;
        for ($j = 0, $i = 0; $j < $n; ++$j) {
            $currentSum += $nums[$j];
            $windowSum += $nums[$j] * ($j - $i + 1);
            while ($currentSum > $target) {
                $windowSum -= $currentSum;
                $currentSum -= $nums[$i++];
            }
            $count += $j - $i + 1;
            $totalSum += $windowSum;
        }
        return [$count, $totalSum];
    }

    private function sumOfFirstK(&$nums, int $n, int $k) 
    {
        $minSum = min($nums);
        $maxSum = array_sum($nums);
        $left = $minSum;
        $right = $maxSum;

        while ($left  <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($this->countAndSum($nums, $n, $mid)[0] >= $k) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        list($count, $sum) = $this->countAndSum($nums, $n, $left);
        return $sum - $left * ($count - $k);
    }
}
