# Write your MySQL query statement below
select t3.name from (select 
    t1.name,
    count(t1.name) as cnt
from employee t1
join employee t2 on t1.id = t2.managerId
group by t1.name
having cnt >= 5) t3

