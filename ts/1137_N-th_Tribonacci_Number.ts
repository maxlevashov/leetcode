let memo = new Map<number, number>([
    [0, 0],
    [1, 1],
    [2, 1]
]);

function tribonacci(n: number): number {
    
    if (!memo.has(n)) {
        memo.set(n, tribonacci(n - 1) + tribonacci(n - 2) + tribonacci(n - 3));
    }

    return memo.get(n);
};

