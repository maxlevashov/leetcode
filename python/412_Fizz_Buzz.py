class Solution(object):
    def fizzBuzz(self, n):
        result = []
        for i in range(1, n + 1): 
            divisibleBy5 = i % 5 == 0
            divisibleBy3 = i % 3 == 0
            
            if divisibleBy5 and divisibleBy3:
                result.append("FizzBuzz")
            elif divisibleBy5:
                result.append("Buzz")
            elif divisibleBy3:
                result.append("Fizz")
            else: 
                result.append(str(i));     
        return result

