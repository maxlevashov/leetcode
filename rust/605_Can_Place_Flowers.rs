impl Solution {
    pub fn can_place_flowers(flowerbed: Vec<i32>, n: i32) -> bool {
        let mut flowerbedClone: Vec<i32> = flowerbed;
        let mut countFlowers: i32 = n;
        for i in 0..flowerbedClone.len() as usize{
            if (
                flowerbedClone[i] == 0 
                && (i == 0 || flowerbedClone[i - 1] == 0)
                && (i == flowerbedClone.len() - 1 || flowerbedClone[i + 1] == 0)
            ) {
                flowerbedClone[i] = 1;
                countFlowers -= 1;

            }
        }  
        return countFlowers <= 0;
    }
}
