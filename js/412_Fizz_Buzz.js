/**
 * @param {number} n
 * @return {string[]}
 */
var fizzBuzz = function(n) {
    let result = [];
        for (i = 1; i <= n; ++i) {
            let divisibleBy5 = i % 5 === 0;
            let divisibleBy3 = i % 3 === 0;

            if (divisibleBy5 && divisibleBy3) {
                result.push("FizzBuzz");
            } else if (divisibleBy5) {
                result.push("Buzz");
            } else if (divisibleBy3) {
                result.push("Fizz");
            } else {
                result.push(String(i));
            }
        }
    return result;
};