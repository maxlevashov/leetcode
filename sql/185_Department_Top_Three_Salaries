# Write your MySQL query statement below

select 
    t2.name as department, 
    t1.name as employee, 
    t1.salary as Salary
from employee t1 
join department t2 on t1.departmentId = t2.Id
where  3 > (
    select 
        count(distinct t3.salary)
    from  employee t3
    where t3.salary > t1.salary
    and t1.departmentId = t3.departmentId
)
