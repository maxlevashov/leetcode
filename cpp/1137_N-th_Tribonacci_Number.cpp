class Solution {
    map<int, int> memo = {{0, 0}, {1, 1}, {2, 1}};
public:
    int tribonacci(int n) {
        if (memo.find(n) == memo.end()) {
            memo[n] = tribonacci(n - 1)
                + tribonacci(n - 2) + tribonacci(n - 3);
        }
        return memo[n];
    }
};

