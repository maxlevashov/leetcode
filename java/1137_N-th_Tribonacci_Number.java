class Solution {
    HashMap<Integer, Integer> memo = new HashMap<Integer, Integer>();

    public int tribonacci(int n) {

        if (n == 0 || n == 1) {
            return n;
        }
        if (n == 2) {
            return 1;
        }
        if (!memo.containsKey(n)) {
            memo.put(n, tribonacci(n - 1) + tribonacci(n - 2) + tribonacci(n - 3));
        }

        return memo.get(n);
    }
}
