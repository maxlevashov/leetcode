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
        $head = $root; 
        $prev = null; 
        $cur = null;  

        while ($head !== null) {    

            $cur = $head;
            $head = null;
            $prev = null;

            while ($cur !== null) { 
    
                if ($cur->left !== null) {
                    if ($prev !== null) {
                        $prev->next = $cur->left;
                    } else {
                        $head = $cur->left;
                    }
                    $prev = $cur->left;
                }
              
                if ($cur->right !== null) {
                    if ($prev !== null) {
                        $prev->next = $cur->right;
                    } else {
                        $head = $cur->right;
                    }
                    $prev = $cur->right;
                }
                
                $cur = $cur->next;
            }        
        }

        return $root;
    }
}

