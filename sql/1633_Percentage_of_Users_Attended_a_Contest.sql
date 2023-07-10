# Write your MySQL query statement below
select 
   t1.contest_id,
   round(count(t1.user_id) / (select count(*) from users) * 100, 2) as percentage
from register t1
join users t2 on t1.user_id = t2.user_id
group by t1.contest_id
order by percentage desc, contest_id asc
