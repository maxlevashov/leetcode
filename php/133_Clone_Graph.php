<?php

/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $neighbors = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->neighbors = array();
 *     }
 * }
 */

class Solution 
{

    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node) 
    {
        if ($node == null) {
            return $node;
        } 
        
        $queue = new SplQueue();
        $queue->enqueue($node);
        $clones[$node->val] =  new Node($node->val);
        while (!$queue->isEmpty()) {
            $currentNode = $queue->dequeue();
            $currentNodeClone = $clones[$currentNode->val];            

            foreach ($currentNode->neighbors as $neighbor) {
                if (!isset($clones[$neighbor->val])) {
                    $clones[$neighbor->val] = new Node($neighbor->val);
                    $queue->enqueue($neighbor);
                }
                    
                $currentNodeClone->neighbors[] = $clones[$neighbor->val];
            }
        }
                
        return $clones[$node->val]; 
    }
}

