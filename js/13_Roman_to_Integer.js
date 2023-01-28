/**
 * @param {string} s
 * @return {number}
 */
var romanToInt = function(s) {
        let numbers = {};
        numbers['I'] = 1;
        numbers['V'] = 5;
        numbers['X'] = 10;
        numbers['L'] = 50;
        numbers['C'] = 100;
        numbers['D'] = 500;
        numbers['M'] = 1000;
        let value = 0;
        for (let i = 0; s[i];  i++) {
            if (s[i + 1] && numbers[s[i]] < numbers[s[i + 1]]) {
                value += numbers[s[i + 1]] - numbers[s[i]];
                i++;
            } else {
                value += numbers[s[i]];
            }
        }

        return value;
};

