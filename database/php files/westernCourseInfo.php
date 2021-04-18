<!DOCTYPE html>
<html>
<head>
<title>equivalence</title>
</head>
<h1>Equivalences of the western course: </h1>
<body>
<?php
include "connectDB.php";
    $number  = $_POST['courseNumber'];
	$query = "SELECT WesternCourses.courseName AS 'western name',WesternCourses.courseNumber, WesternCourses.courseWeight AS 'Western weight',officialName, OutsideCourses.courseName ,OutsideCourses.code, OutsideCourses.courseWeight, equivalentDate FROM WesternCourses, universities, Equivalent, OutsideCourses WHERE Equivalent.code = OutsideCourses.code and WesternCourses.courseNumber = Equivalent.courseNumber and OutsideCourses.uniqueNumber = universities.uniqueNumber and universities.uniqueNumber = Equivalent.uniqueNumber and WesternCourses.courseNumber='$number';";

$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed." . mysqli_connect_error());
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $name => $value) {
    echo " $value<br />";
}
echo "<br>";
}
mysqli_free_result($result);
echo "</ol>";
?>


</body>
</html>

