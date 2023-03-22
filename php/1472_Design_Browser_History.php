<?php

class BrowserHistory
{

    protected $history = [];
    protected $currentIndex = 0;

    /**
     * @param String $homepage
     */
    function __construct($homepage)
    {
        $this->history[] = $homepage;
    }

    /**
     * @param String $url
     * @return NULL
     */
    function visit($url)
    {
        $this->history = array_slice($this->history, 0, $this->currentIndex + 1);
        $this->history[] = $url;
        $this->currentIndex++;
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function back($steps)
    {
        $this->currentIndex = max(0, $this->currentIndex - $steps);

        return $this->history[$this->currentIndex];
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function forward($steps)
    {
        $this->currentIndex = min(
            count($this->history) - 1,
            $this->currentIndex + $steps
        );

        return $this->history[$this->currentIndex];
    }

}

/**
 * Your BrowserHistory object will be instantiated and called as such:
 * $obj = BrowserHistory($homepage);
 * $obj->visit($url);
 * $ret_2 = $obj->back($steps);
 * $ret_3 = $obj->forward($steps);
 */

