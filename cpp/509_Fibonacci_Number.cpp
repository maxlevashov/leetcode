class Solution {
    map<int, int> memo = {{0,0}, {1, 1}};
public:
    int fib(int n) {
        if (memo.find(n) == memo.end()) {
            memo[n] = fib(n - 1) + fib(n - 2);
        }
        return memo[n];
    } 
};

