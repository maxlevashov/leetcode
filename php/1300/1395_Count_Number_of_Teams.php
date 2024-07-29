class Solution 
{

    /**
     * @param Integer[] $rating
     * @return Integer
     */
    function numTeams($rating) 
    {
        $n = count($rating);
        $teams = 0;

        $increasingTeams = array_fill(0, $n, array_fill(0, 4, 0));
        $decreasingTeams = array_fill(0, $n, array_fill(0, 4, 0));

        for ($i = 0; $i < $n; $i++) {
            $increasingTeams[$i][1] = 1;
            $decreasingTeams[$i][1] = 1;
        }

        for ($count = 2; $count <= 3; $count++) {
            for ($i = 0; $i < $n; $i++) {
                for ($j = $i + 1; $j < $n; $j++) {
                    if ($rating[$j] > $rating[$i]) {
                        $increasingTeams[$j][$count] +=
                            $increasingTeams[$i][$count - 1];
                    }
                    if ($rating[$j] < $rating[$i]) {
                        $decreasingTeams[$j][$count] +=
                            $decreasingTeams[$i][$count - 1];
                    }
                }
            }
        }

        for ($i = 0; $i < $n; $i++) {
            $teams += $increasingTeams[$i][3] + $decreasingTeams[$i][3];
        }

        return $teams;
    }
}
