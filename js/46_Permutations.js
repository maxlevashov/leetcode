/**
 * @param {number[]} nums
 * @return {number[][]}
 */
let permute = function(nums) {
    return permuteRecursive(nums);
};

let permuteRecursive = function (nums, perms = []) {   
    if (!nums.length) {
        return [perms];
    }  

    let permutations = [];
    let newNums = [];
    let newPerms = [];
    for (let i = nums.length - 1; i >= 0; --i) { 
        newNums = nums.slice();
        newPerms = perms.slice();
        [foo] = newNums.splice(i, 1);
        newPerms.unshift(foo);
        permutations = permutations.concat(
            permuteRecursive(newNums, newPerms)
        );
    }
    
    return permutations;
}

