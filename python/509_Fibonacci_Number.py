class Solution(object):
    def fib(self, n):
        if n == 0:
            return 0
        a, b = 1, 1
        for i in range(1, n):
            a, b = b, a + b
        return a
