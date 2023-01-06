class Solution(object):
    def canConstruct(self, ransomNote, magazine):
        magazineChars = {}
        for i in range (0, len(magazine)):
            if magazineChars.get(magazine[i]) != None:
                magazineChars[magazine[i]] += 1
            else:
                magazineChars[magazine[i]] = 1
        print(magazineChars)
        for i in range (0, len(ransomNote)):
            if (magazineChars.get(ransomNote[i]) != None
                and magazineChars.get(ransomNote[i])) > 0:
                magazineChars[ransomNote[i]] -= 1
            else:
                return False
        return True

