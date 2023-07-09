# Write your MySQL query statement below
select
    t1.student_id,
    t1.student_name,
    t3.subject_name,
    count(t2.student_id) as attended_exams
from students t1
cross join subjects t3 
left join examinations t2 
    on t1.student_id = t2.student_id 
    and t3.subject_name = t2.subject_name  
group by t1.student_id, t1.student_name, t3.subject_name
order by t1.student_id, t3.subject_name

