USE crailtoassign2db;

SELECT * FROM universities;

LOAD DATA LOCAL INFILE '/home/centos/myrepo/assignment2/universities.txt' INTO TABLE universities
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
(uniqueNumber, officialName, city, province, nickName);

SELECT * FROM universities;

SELECT * FROM WesternCourses;
INSERT INTO WesternCourses VALUES ("cs1026", "Computer Science Fundamentals I", "0.5","A/B");
INSERT INTO WesternCourses VALUES ("cs1027","Computer Science Fundamentals II", "0.5", "A/B");
INSERT INTO WesternCourses VALUES ("cs2210", "Algorithms and Data Structures", "1.0", "A/B");
INSERT INTO WesternCourses VALUES ("cs3319", "Databases I","0.5", "A/B");
INSERT INTO WesternCourses VALUES ("cs2120", "Modern Survival Skills I: Coding Essentials", "0.5","A/B");
INSERT INTO WesternCourses VALUES ("cs4490", "Thesis", "0.5", "Z");
INSERT INTO WesternCourses VALUES ("cs0020", "Intro to Coding using Pascal and Fortran", "1.0", "" );
INSERT INTO WesternCourses VALUES ("cs4455", "Stock market analysis with coding","0.5", "A/B");

SELECT * FROM WesternCourses;

SELECT * FROM universities;
INSERT INTO universities VALUES (5, "University of Brock", "Brock","Niagara falls", "ON");
SELECT * FROM universities;

SELECT * FROM OutsideCourses;
/* uoft*/

INSERT INTO OutsideCourses Values("CompSci022", "Intro to programing", 1, "0.5",2);
INSERT INTO OutsideCourses Values("CompSci033", "Intro to Programming for Med students", 3, "0.5",2);
INSERT INTO OutsideCourses Values("CompSci021", "Packages", 1, "0.5",2);
INSERT INTO OutsideCourses Values("CompSci022", "intro to programing", 1, "0.5",2);
INSERT INTO OutsideCourses Values("CompSci222", "Introduction to Databases", 2, "1.0",2);
INSERT INTO OutsideCourses Values("CompSci023", "Advanced Programming", 1, "0.5",2);
/* waterloo*/

INSERT INTO OutsideCourses Values("CompSci011", "Intro to Computer Science", 2, "0.5",4);
INSERT INTO OutsideCourses Values("CompSci123", "Using Unix", 2, "0.5",4);
/* ubc*/
INSERT INTO OutsideCourses Values("CompSci021", "Intro Programming", 1, "1.0",66);
INSERT INTO OutsideCourses Values("CompSci022", "Advanced Programming", 1, "0.5",66);
INSERT INTO OutsideCourses Values("CompSci319", "Using Databases", 3, "0.5",66);

/* mac*/
INSERT INTO OutsideCourses Values("CompSci333", "Graphics", 3, "0.5",55);
INSERT INTO OutsideCourses Values("CompSci444", "Networks", 4, "0.5",55);
/* Laurier*/
INSERT INTO OutsideCourses Values("CompSci022", "Using Packages", 1, "0.5",77);
INSERT INTO OutsideCourses Values("CompSci101", "Introduction to Using Data Structures", 2, "0.5",77);
/* Brock*/
INSERT INTO OutsideCourses Values("CompSci111", "intro to machine learning", 2, "1.0",5);
INSERT INTO OutsideCourses Values("CompSci999", "Programing", 1, "0.5",5);

SELECT * FROM OutsideCourses;

SELECT * FROM Equivalent;

INSERT INTO Equivalent Values("cs1026", "CompSci022", 2, "2015-05-12");
INSERT INTO Equivalent Values("cs1026", "CompSci033", 2, "2013-01-02");
INSERT INTO Equivalent Values("cs1026", "CompSci011", 4, "1997-02-09");
INSERT INTO Equivalent Values("cs1026", "CompSci021", 66, "2010-01-12");
INSERT INTO Equivalent Values("cs1027", "CompSci023", 2, "2017-06-22");
INSERT INTO Equivalent Values("cs1027", "CompSci022", 66, "2019-09-01");
INSERT INTO Equivalent Values("cs2210", "CompSci101", 77, "1998-07-12");
INSERT INTO Equivalent Values("cs3319", "CompSci222", 2, "1990-09-13");
INSERT INTO Equivalent Values("cs3319", "CompSci319", 66, "1987-09-21");
INSERT INTO Equivalent Values("cs2120", "CompSci022", 2, "2018-12-10");
INSERT INTO Equivalent Values("cs0020", "CompSci022", 2, "1999-09-17");

SELECT * FROM Equivalent;

SELECT * FROM Equivalent;

UPDATE Equivalent SET EquivalentDate = "Sep 19, 2018" WHERE courseNumber="cs0020";

SELECT * FROM Equivalent;

SELECT * FROM universities;

UPDATE universities SET year = "Sep 19, 2018" WHERE courseNumber="cs0020";


SELECT * FROM OutsideCourses;

UPDATE OutsideCourses SET courseYear = 1 WHERE courseName Like 'Intro%';

SELECT * FROM OutsideCourses;









