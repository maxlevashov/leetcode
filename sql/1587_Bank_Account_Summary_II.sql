# Write your MySQL query statement below
select 
    t1.name,
    sum(t2.amount) as balance
from users t1
join transactions t2 on t1.account = t2.account
group by t1.name
having balance > 10000

