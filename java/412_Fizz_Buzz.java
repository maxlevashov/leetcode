class Solution {
    public List<String> fizzBuzz(int n) {
        ArrayList<String> result = new ArrayList<String>();
        for (int i = 1; i <= n; ++i) {
            Boolean divisibleBy5 = i % 5 == 0;
            Boolean divisibleBy3 = i % 3 == 0;

            if (divisibleBy5 && divisibleBy3) {
                result.add("FizzBuzz");
            } else if (divisibleBy5) {
                result.add("Buzz");
            } else if (divisibleBy3) {
                result.add("Fizz");
            } else {
                result.add( Integer.toString(i));
            }
        }
        return result;
    }
}