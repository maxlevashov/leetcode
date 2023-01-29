/**
 * @param {string} s
 * @return {number}
 */
var myAtoi = function(s) {
    let counter = 0;
    let sign = 1;
    let result = 0;
    const INT_MAX = 2147483647;
    const INT_MIN = -2147483648;

    while (s[counter] === ' ') {
        counter++;
    }

    if (s[counter] == '+' || s[counter] == '-') {
        sign = s[counter] == '+' ? 1 : -1;
        counter++;
    }

    while (s[counter] >= '0' && s[counter] <= '9') {
        result = (result * 10) + (s[counter] - 0);
        if (sign == 1 && result > INT_MAX) {
            return INT_MAX;
        }
        if (sign == -1 && result > INT_MAX + 1) {
            return INT_MIN;
        }
        counter++;
    }

    return result * sign;
};


