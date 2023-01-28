/**
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number}
 */
var findMedianSortedArrays = function(nums1, nums2) {
        let merge = [];
        nums1.forEach((num) => {  
            merge.push(num);
        });
        nums2.forEach((num) => {  
            merge.push(num);
        });
        merge.sort(function(a, b) {
            return a - b;
        });
        mergeSize = merge.length;  
        
        return mergeSize % 2 
            ? merge[parseInt(mergeSize / 2)] 
            : (merge[mergeSize / 2 - 1] + merge[mergeSize / 2]) / 2;
};

