class Solution {
    public boolean canConstruct(String ransomNote, String magazine) {
        HashMap<Character, Integer> magazineChars = new HashMap<>();
        for (int i = 0; i < magazine.length(); ++i) {
            char m = magazine.charAt(i);
            int currentCount = magazineChars.getOrDefault(m, 0);
            magazineChars.put(m, currentCount + 1);
        }
        for (int i = 0; i < ransomNote.length(); ++i) {
            char r = ransomNote.charAt(i);
            int currentCount = magazineChars.getOrDefault(r, 0);
            if (currentCount == 0) {
                return false;
            }
            magazineChars.put(r, currentCount - 1);
        }
        return true;
    }
}