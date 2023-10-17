<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[] $leftChild
     * @param Integer[] $rightChild
     * @return Boolean
     */
    function validateBinaryTreeNodes($n, $leftChild, $rightChild) 
    {
        $queue = new SplQueue(); 

        $visited = []; 
        $root = $this->findRoot($n, $leftChild, $rightChild); 
        if ($root == -1) {
            return false; 
        }

        $queue->push($root);
        while (!$queue->isEmpty()) {
            $node = $queue->pop(); 
            if ($node == -1) {
                continue; 
            }
            if (isset($visited[$node])) {
                return false;
            } else {
                $visited[$node] = $node;
            }

            $left = $leftChild[$node];
            $right = $rightChild[$node];

            $queue->push($left); 
            $queue->push($right); 
        }

        return count($visited) == $n;
    }

    protected function findRoot(int $n, $left, $right) 
    {
        $set = [];
        for ($i = 0; $i < $n; $i++) {
            $set[$i] = $i; 
        }
        foreach ($left as $node) {
            unset($set[$node]); 
        }
        foreach ($right as $node) {
            unset($set[$node]);
        }

        return count($set) == 1 ? current($set) : -1; 
    }
}

