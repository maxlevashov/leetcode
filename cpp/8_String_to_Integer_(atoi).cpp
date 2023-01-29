<?php

class Solution {
public:
    int myAtoi(string s) {
        int counter = 0;
        int sign = 1;
        long result = 0;

        while (s[counter] == ' ') {
            counter++;
        }

        if (s[counter] == '+' || s[counter] == '-') {
            sign = s[counter] == '+' ? 1 : -1;
            counter++;
        }

        while (s[counter] >= '0' && s[counter] <= '9') {
            result = (result * 10) + (s[counter] - '0');
            if (sign * result >= INT_MAX) {
                return INT_MAX;
            }
            if (sign * result <= INT_MIN) {
                return INT_MIN;
            }
            counter++;
        }

        return result * sign;
    }
};

