<?php

class Solution
{

    /**
     * @param String[] $emails
     * @return Integer
     */
    function numUniqueEmails($emails)
    {
        $normalized = [];
        foreach ($emails as $email) {
            $parts = explode('@', $email);
            $local = explode('+', $parts[0]);
            $normalized[str_replace(".", "", $local[0]) . "@" . $parts[1]] = false;
        }

        return count($normalized);
    }

}
