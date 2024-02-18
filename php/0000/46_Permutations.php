<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        return $this->permuteRecursive($nums);
    }

    protected function permuteRecursive($items, $perms = [])
    {
        if (empty($items)) {
            return [$perms];
        }

        $permutations = [];
        for ($i = count($items) - 1; $i >= 0; --$i) {
            $newitems = $items;
            $newperms = $perms;
            list($foo) = array_splice($newitems, $i, 1);
            array_unshift($newperms, $foo);
            $permutations = array_merge(
                $permutations,
                $this->permuteRecursive($newitems, $newperms)
            );
        }

        return $permutations;
    }

}
