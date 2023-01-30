/**
 * @param {number} n
 * @return {number}
 */
let memo = {};
var tribonacci = function(n) {
    if (n === 0 || n === 1) {
        return n;
    }
    if (n === 2) {
        return 1;
    }
    if (!memo[n]) {
        memo[n] = tribonacci(n - 1) + tribonacci(n - 2) + tribonacci(n - 3);
    }

    return memo[n];
};


