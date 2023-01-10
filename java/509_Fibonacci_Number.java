class Solution {
   
    public int fib(int n) {
        if (n == 0) {
            return n;
        }

        int fibNums[] = new int[n + 1];
        fibNums[1] = 1;
        for (int i = 2; i < n + 1; i++) {
            fibNums[i] = fibNums[i - 1] + fibNums[i - 2];
        }
        return fibNums[n];
    }
}
