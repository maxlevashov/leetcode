class Solution {
    public int maximumWealth(int[][] accounts) {
        int maxSum = 0;
        int tempSum = 0;
        for (int[] account : accounts) {
            for (int price : account) {
                tempSum += price;
            }
            maxSum = Math.max(maxSum, tempSum);
            tempSum = 0;
        }

        return maxSum;
    }
}
