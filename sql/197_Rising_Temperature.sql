# Write your MySQL query statement below
select
    t2.id   
from weather t1
left join weather t2 
    on t1.recorddate = t2.recorddate - INTERVAL 1 DAY
where t1.temperature < t2.temperature

