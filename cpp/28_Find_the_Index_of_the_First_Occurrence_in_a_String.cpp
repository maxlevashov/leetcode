class Solution {
public:
    int strStr(string haystack, string needle) {
        int needleSize = needle.size();
        int haystackSize = haystack.size();

        for (int start = 0; start <= haystackSize - needleSize; start++) {
            for (int i = 0; i < needleSize; i++) {
                if (needle[i] != haystack[start + i]) {
                    break;
                }
                if (i == needleSize - 1) {
                    return start;
                }
            }
        }

        return -1;
    }
};

