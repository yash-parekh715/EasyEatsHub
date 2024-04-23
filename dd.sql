[4/17, 8:02 PM] Darshan Patel:
 SELECT distinct course FROM about_recipe
[4/17, 8:03 PM] Darshan Patel: 
select racipe_name from racipe;
select ingrediant_name from ingrediant_details;
[4/17, 8:04 PM] Darshan Patel: 
SELECT distinct cusine FROM about_recipe;
[4/17, 8:06 PM] Darshan Patel: 
INSERT INTO about_recipe(RACIPE_ID, DIET,COURSE,CUSINE) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]');          to add recipe cusine and course
[4/17, 8:06 PM] Darshan Patel: 
SELECT  Distinct DIET FROM about_recipe ;
[4/17, 8:07 PM] Darshan Patel: 
INSERT INTO ingrediant_details (INGREDIANT_ID, INGREDIANT_NAME) VALUES ('[value-1]','[value-2]');    TO ADD INGRIDIENT
[4/17, 8:13 PM] Darshan Patel: 
UPDATE ingrediant_details SET INGREDIANT_ID='[value-1]',INGREDIANT_NAME='[value-2]' WHERE INGREDIANT_NAME='[VALUE 3]' ;   TO UPDATE ANY INGRIDIENT
[4/17, 10:02 PM] Darshan Patel:
 select cusine,diet,course from about_recipe where cusine="indian" and course="side dish";
[4/17, 10:10 PM] Darshan Patel:
 select racipe_id from racipe where ((prep_time+cook_time)<60);    to find total time<60
[4/17, 10:20 PM] Darshan Patel:
 select racipe_id,racipe_name from racipe  order by racipe_id desc limit 10;   for last 10 rows
[4/17, 10:21 PM] Darshan Patel:4
 -- Get the total number of rows in your result set
SELECT COUNT(*) AS total_rows
FROM your_table;

-- Determine the number of pages required
SET @total_rows = (SELECT COUNT(*) FROM your_table);
SET @rows_per_page = 10;
SET @total_pages = CEIL(@total_rows / @rows_per_page);

-- Select data for a specific page
SELECT *
FROM your_table
ORDER BY <your_ordering_column>
LIMIT 10 OFFSET <offset_value>;
[4/17, 10:57 PM] Darshan Patel: 

SELECT r.racipe_id,a.cusine, a.diet, a.course
FROM about_recipe a 
join racipe r
on a.racipe_id=r.racipe_id
WHERE 
    (cusine = 'indian' OR 'all' = 'indian' and 'all' = 'all')
    AND
    (diet = 'vegetarian' OR 'all' = 'vegetarian' and 'all' = 'all')
    AND
    (course = 'all' OR 'all' = 'all' and 'all' = 'all');
