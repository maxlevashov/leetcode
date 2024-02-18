<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $meetings
     * @return Integer
     */
    function mostBooked($n, $meetings) 
    {
        $roomAvailabilityTime = array_fill(0, $n, 0);
        $meetingCount = array_fill(0, $n, 0);
        sort($meetings);

        foreach ($meetings as $meeting) {
            $start = $meeting[0];
            $end = $meeting[1];
            $minRoomAvailabilityTime = PHP_INT_MAX;
            $minAvailableTimeRoom = 0;
            $foundUnusedRoom = false;

            for ($i = 0; $i < $n; $i++) {
                if ($roomAvailabilityTime[$i] <= $start ) {
                    $foundUnusedRoom = true;
                    $meetingCount[$i]++;
                    $roomAvailabilityTime[$i] = $end;
                    break;
                }

                if ($minRoomAvailabilityTime > $roomAvailabilityTime[$i]) {
                    $minRoomAvailabilityTime = $roomAvailabilityTime[$i];
                    $minAvailableTimeRoom = $i;
                }
            }

            if (!$foundUnusedRoom) {
                $roomAvailabilityTime[$minAvailableTimeRoom] += $end - $start;
                $meetingCount[$minAvailableTimeRoom]++;
            }
        }
        $maxMeetingCount = 0;
        $maxMeetingCountRoom = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($meetingCount[$i] > $maxMeetingCount) {
                $maxMeetingCount = $meetingCount[$i];
                $maxMeetingCountRoom = $i;
            }
        }
        return $maxMeetingCountRoom;
    }
}

