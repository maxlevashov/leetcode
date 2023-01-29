/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLongestSubstring = function(s) {
    let stringLength = s.length;
    let result = 0;
    let index = {};
    for (let j = 0, i = 0; j < stringLength; j++) {
        if (!index[s[j]]) {
            index[s[j]] = 0;
        }
        i = Math.max(index[s[j]], i);
        result = Math.max(result, j - i + 1);
        index[s[j]] = j + 1;
    }
    
    return result;
};

