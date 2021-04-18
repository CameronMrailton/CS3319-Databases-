USE crailtoassign2db;

CREATE VIEW question1 AS SELECT  OutsideCourses.courseName AS 'other courseTitle', officialName, nickName, city, WesternCourses.courseName 
FROM    ((OutsideCourses INNER JOIN Equivalent ON (OutsideCourses.code = Equivalent.code and OutsideCourses.uniqueNumber = Equivalent.uniqueNumber and OutsideCourses.courseYear = "1"))
                INNER JOIN universities ON universities.uniqueNumber = Equivalent.uniqueNumber)
                INNER JOIN WesternCourses ON WesternCourses.courseNumber = Equivalent.courseNumber
                WHERE OutsideCourses.courseYear = "1" and OutsideCourses.uniqueNumber = universities.uniqueNumber;

SELECT * FROM question1;

SELECT * FROM question1 WHERE nickName = "UofT" ORDER BY courseName ASC;
-- Run your view again but this time just select all the columns from the view for universities with the nickname "UofT" . Order the rows in ascending order by the Western Course name. 

-- Show all the university table information
SELECT * FROM universities;

-- Delete any university that has a nickname with the letters "cord" in it.
DELETE FROM universities WHERE nickName LIKE "%cord%";

-- Show all the university table information again to make sure it was remove
SELECT * FROM universities;

-- Delete any university from Ontario
DELETE FROM universities WHERE province = "ON";
-- Put a comment (-- the reason why ...) in your script file to explain why the Ontario universities could not be delete
-- They where not able to be deleted cause university is a parent class, and the other tables with foreign keys would loose those values, 
SELECT * FROM universities;
-- Show everything in the university table again

-- Show all the information about the outside course and all the information the university they are associated with
SELECT * FROM OutsideCourses INNER JOIN universities ON OutsideCourses.uniqueNumber = universities.uniqueNumber;

-- Delete all the courses that are offered from a university in the city of Waterloo. Make sure you use city = "Waterloo" in your delete statement.

DELETE FROM OutsideCourses where OutsideCourses.uniqueNumber IN (select uniqueNumber from universities WHERE universities.city = "waterloo");

-- Show all the information about the outside course and all the information the university they are associated with to make sure those courses were deleted.
-- Run your view again and make sure that the equivalencies were also deleted from the view (Just double check that the rows returned from the steps above where you create your view are less now).

SELECT * FROM question1;

