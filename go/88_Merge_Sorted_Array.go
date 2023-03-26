func merge(nums1 []int, m int, nums2 []int, n int)  {
    nums1 = nums1[0:m];
    nums2 = nums2[0:n];
    nums1 = append(nums1, nums2...);
    sort.Ints(nums1);
}
