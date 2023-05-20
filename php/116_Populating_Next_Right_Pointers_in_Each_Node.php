<?php

/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution 
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) 
    {
        if (!$root) {
            return null;
        }
        $queue = new SplQueue();
        $queue->enqueue($root); 

        while (!$queue->isEmpty()) {
            $rightNode = null;                    
            for ($i = $queue->count(); $i; $i--) {                
                $curent = $queue->dequeue();            
                $curent->next = $rightNode;                  
                $rightNode = $curent;                          
                if ($curent->right) {                         
                    $queue->enqueue($curent->right);                
                    $queue->enqueue($curent->left);
                }                 
            }
        }

        return $root;
    }
}

