/**
 * @param {number[][]} accounts
 * @return {number}
 */
var maximumWealth = function(accounts) {
    let maxSum = 0;
    let tempSum = 0;
    accounts.forEach((account) => {
        account.forEach((price) => {
            tempSum += price;  
        });
        maxSum = Math.max(maxSum, tempSum);
        tempSum = 0;
    });
    
    return maxSum;
};
