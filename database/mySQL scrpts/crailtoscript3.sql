USE crailtoassign2db;



-- query 1 Show the course names of all the Western Courses
SELECT courseName From WesternCourses;
-- query 2 Show the course numbers of all courses from other universities with no repeats
SELECT distinct code FROM OutsideCourses;
-- query 3 Show all the data in the Western Course table, but show them in order of their course names from A to Z;
SELECT * From WesternCourses ORDER BY courseName ASC;
-- query 4 List the course number and title of all half (0.5) Western courses.
SELECT courseNumber, courseName From WesternCourses WHERE courseWeight = "0.5";
-- query 5 List all the course numbers and course names from courses offered at the University of Toronto (you must use the University's Name as the lookup in the query not the unique university number)
SELECT code, courseName From OutsideCourses WHERE uniqueNumber IN (SELECT uniqueNumber FROM universities WHERE officialName = "University of Toronto");
-- query 6 List the outside university course name and the university nickname of any course whose name has the word "Introduction" somewhere in the name.
SELECT courseName, nickName From OutsideCourses, universities WHERE OutsideCourses.courseName IN  (SELECT courseName FROM OutsideCourses WHERE courseName Like 'Introduction%') and universities.uniqueNumber = OutsideCourses.uniqueNumber;
-- query 7 List all courses names, their universities names, the Western course name, the evaluated date of equivalent courses but only those courses that have not been reevaluated in the last 5 years. (Google the MySQL command's CURDATE() and DATE_SUB() with INTERVAL YEAR to help you make this work no matter what date it is fun).
SELECT OutsideCourses.courseName, officialName, WesternCourses.courseName , equivalentDate FROM OutsideCourses, universities, Equivalent, WesternCourses WHERE OutsideCourses.code = Equivalent.code and Equivalent.courseNumber = WesternCourses.courseNumber and OutsideCourses.uniqueNumber = universities.uniqueNumber and universities.uniqueNumber = Equivalent.uniqueNumber AND Equivalent.equivalentDate > (DATE_SUB(CURDATE(), INTERVAL 60 MONTH));
-- query 8 List the all courses names and the university nicknames of course that are equivalent to Western's cs1026.
SELECT courseName, nickName FROM OutsideCourses, universities, Equivalent WHERE OutsideCourses.code = Equivalent.code and Equivalent.courseNumber = "cs1026" and OutsideCourses.uniqueNumber = universities.uniqueNumber and universities.uniqueNumber = Equivalent.uniqueNumber;
-- query 9 Count the number of courses that are equivalent to Western's cs1026
SELECT COUNT(*) AS "# of equivalent courses to westerns 1026" FROM OutsideCourses, universities, Equivalent WHERE OutsideCourses.code = Equivalent.code and Equivalent.courseNumber = "cs1026" and OutsideCourses.uniqueNumber = universities.uniqueNumber and universities.uniqueNumber = Equivalent.uniqueNumber;
-- query 10 List all Western course names and the outside course name and the university nickname  of Western courses that are equivalent to a course offered by ANY university in Waterloo, Ontario.
SELECT  WesternCourses.courseName , OutsideCourses.courseName, nickName FROM OutsideCourses, universities, WesternCourses WHERE OutsideCourses.code IN (SELECT code FROM Equivalent WHERE Equivalent.uniqueNumber = 4 and Equivalent.courseNumber = WesternCourses.courseNumber) and universities.uniqueNumber = 4; 
-- query 11  List all University Names where they do not have any courses equivalent to a Western Course.
SELECT officialName FROM universities WHERE universities.uniqueNumber NOT IN (SELECT uniqueNumber FROM Equivalent);
-- query 12 Find the course name of any Western course and Western course number that is equivalent to a third or fourth year class at another university. 
SELECT courseName, courseNumber FROM WesternCourses WHERE  courseNumber IN (SELECT Equivalent.courseNumber FROM Equivalent WHERE Equivalent.code IN (SELECT OutsideCourses.code FROM OutsideCourses WHERE courseYear = 3 or courseYear = 4));
-- query 13 Find the names of any Western courses that are equivalent to more than one outside course. (Hint: you will have to use the key words Group By and Having)
SELECT courseName FROM WesternCourses WHERE WesternCourses.courseNumber IN (SELECT courseNumber FROM Equivalent GROUP BY Equivalent.courseNumber Having count(Equivalent.courseNumber) > 1) ;
-- query 14 We want to make sure that students dont get credit for a half course from another university that was supposed to be a full course at Western or vise versa. Write a query that finds all outside courses that are equivalent to one or more of the Western courses but dont have the same weight as that course.  
-- Output the Western course num and name and weight and output the outside course name and university name and weight.  Write the query so that the columns have the following neat titles "Western Course Number", "Western Course Name", "Course Weight", "Other University Course Name", "University Name" and "Other Course Weight".
SELECT WesternCourses.courseNumber AS 'Western Course Number', WesternCourses.courseName AS 'Western Course Name',  WesternCourses.courseWeight AS 'Course Weight', OutsideCourses.courseName AS 'Other University Course Name' , officialName AS 'University Name', OutsideCourses.courseWeight AS "Other Course Weight" FROM WesternCourses, OutsideCourses, universities, Equivalent WHERE OutsideCourses.courseWeight <> WesternCourses.courseWeight  and (OutsideCourses.code = Equivalent.code and WesternCourses.courseNumber = Equivalent.courseNumber and universities.uniqueNumber = Equivalent.uniqueNumber );







