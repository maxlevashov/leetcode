class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $time
     * @param Integer $change
     * @return Integer
     */
    function secondMinimum($n, $edges, $time, $change) {
        $adj = [];
        foreach ($edges as $edge) {
            $adj[$edge[0]][] = $edge[1];
            $adj[$edge[1]][] = $edge[0];
        }

        $dist1 = array_fill(0, $n + 1, PHP_INT_MAX);
        $dist2 = array_fill(0, $n + 1, PHP_INT_MAX);
        $freq = array_fill(0, $n + 1, 0);
        $min_heap = new SplPriorityQueue();
        $min_heap->insert([0, 1], 1);
        $dist1[1] = 0;

        while (!$min_heap->isEmpty()) {
            list($timeTaken, $node) = $min_heap->extract();
            $freq[$node]++;
            if ($freq[$node] == 2 && $node == $n) return $timeTaken;
            if ((intval($timeTaken / $change)) % 2) {
                $timeTaken = $change * (intval($timeTaken / $change) + 1) + $time;
            } else {
                $timeTaken = $timeTaken + $time;
            }

            foreach ($adj[$node] as $neighbor) {
                if ($freq[$neighbor] == 2) continue;
                if ($dist1[$neighbor] > $timeTaken) {
                    $dist2[$neighbor] = $dist1[$neighbor];
                    $dist1[$neighbor] = $timeTaken;
                    $min_heap->insert([$timeTaken, $neighbor], -$timeTaken);
                } elseif (
                    $dist2[$neighbor] > $timeTaken 
                    && $dist1[$neighbor] != $timeTaken
                ) {
                    $dist2[$neighbor] = $timeTaken;
                    $min_heap->insert([$timeTaken, $neighbor], -$timeTaken);
                }
            }
        }
        return 0;
    }
}
