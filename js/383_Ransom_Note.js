/**
 * @param {string} ransomNote
 * @param {string} magazine
 * @return {boolean}
 */
var canConstruct = function(ransomNote, magazine) {
    let countChars = new Map();;
    for (i = 0; i < magazine.length; ++i) {
        temp = countChars.get(magazine[i]) === undefined
            ? 0 : countChars.get(magazine[i]);
        countChars.set(magazine[i], temp + 1);  
    }
    for (i = 0; i < ransomNote.length; ++i) {
        let temp = countChars.get(ransomNote[i]);
        if (temp <= 0 || temp === undefined) {
            return false;
        }
        countChars.set(ransomNote[i], countChars.get(ransomNote[i]) - 1);
    }
    return true;
};