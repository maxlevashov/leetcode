<?php

class Solution 
{

    /**
     * @param String $num
     * @param Integer $target
     * @return String[]
     */
    function addOperators($num, $target) 
    {
        $result = [];
        if ($num == null || strlen($num) == 0) {
            return $result;
        }
        $this->addOperatorsRec($result, '', $num, $target, 0, 0, 0);

        return $result;
    }

    protected function addOperatorsRec(
        &$result, string $path, string $num, int $target, 
        int $pos, $eval, $multed
    ) {
        if ($pos == strlen($num)) {
            if ($target == $eval) {
                $result[] = $path;
            }
            return;
        }
        for ($i = $pos; $i < strlen($num); $i++) {
            if ($i != $pos && $num[$pos] == '0') {
                break;
            }
            $cur = substr($num, $pos, $i + 1 - $pos);
            if ($pos == 0){
                $this->addOperatorsRec($result, $path . $cur, $num, 
                    $target, $i + 1, $cur, $cur);
            } else{
                $this->addOperatorsRec($result, $path . "+" . $cur, 
                    $num, $target, $i + 1, $eval + $cur , $cur);
                $this->addOperatorsRec($result, $path . "-" . $cur, 
                    $num, $target, $i + 1, $eval -$cur, -$cur);
                $this->addOperatorsRec(
                    $result, $path . "*" . $cur, $num, $target, $i + 1, 
                    $eval - $multed + $multed * $cur, $multed * $cur );
            }
        }
    }
}

