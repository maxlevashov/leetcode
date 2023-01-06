class Solution {
public:
    bool canConstruct(string ransomNote, string magazine) {
        unordered_map<char, int> magazineChars;
        for (int i = 0; i < magazine.size(); ++i) {
            if (magazineChars.find(magazine[i]) != magazineChars.end()) {
                magazineChars[magazine[i]] += 1;
            } else {
                magazineChars[magazine[i]] = 1;
            }
        }
        for (int i = 0; i < ransomNote.size(); ++i) {
            cout << magazineChars[ransomNote[i]];
            if (magazineChars.find(ransomNote[i]) != magazineChars.end()
                 && magazineChars[ransomNote[i]] > 0) {
                magazineChars[ransomNote[i]] -= 1;
            } else {
                return false;
            }
        }
        return true;
    }
};