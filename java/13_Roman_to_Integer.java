class Solution {
    public int romanToInt(String s) {
        HashMap<Character, Integer> numbers = new HashMap<Character, Integer>();
        numbers.put('I', 1);
        numbers.put('V', 5);
        numbers.put('X', 10);
        numbers.put('L', 50);
        numbers.put('C', 100);
        numbers.put('D', 500);
        numbers.put('M', 1000);
        int value = 0;
        for (int i = 0; i < s.length();  i++) {
            if (
                i + 1 < s.length()
                && numbers.get(s.charAt(i)) < numbers.get(s.charAt(i + 1))
            ) {
                value += numbers.get(s.charAt(i + 1)) - numbers.get(s.charAt(i));
                i++;
            } else {
                value += numbers.get(s.charAt(i));
            }
        }

        return value;
    }
}
