<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Courses</title>
</head>
<body>
<?php
include 'connectDB.php';
?>
Show Western Courses with what order:
<br>By course Name or Number:
<form action = "" method = "post">
 course Name<input type="radio" name="nameNum" value = "courseName" checked><br/>
 course Number<input type="radio" name="nameNum" value = "courseNum"> <br/>
<br>In Ascending or descending order:<br>
 Acending<input type="radio" name="order" value = "Asc" checked><br/>
 Descending<input type="radio" name="order" value = "Des"> <br/>
 <input type="submit" name="formSubmit" value="Submit">
</form>
<?php
if (isset($_POST['nameNum'])){
include 'getData.php';
}
?>
<br>

Update a course:
<form action="/vm176/a3Maxime/updateCourse.php" method="post">
<?php
$query = "SELECT * FROM WesternCourses";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<select name='courseNumber'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " <option value='".$row['courseNumber']."'>".$row['courseNumber'] . "</option>";

}
mysqli_free_result($result);
echo "</select>";
?>
<input type="submit">
</form>
<br>
Delete a course:
<form action="/vm176/a3Maxime/deleteCourse.php" method="post">
<?php
$query = "SELECT * FROM WesternCourses";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<select name='courseNumber'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " <option value='".$row['courseNumber']."'>".$row['courseNumber'] . "</option>";

}
mysqli_free_result($result);
echo "</select>";
?>
<input type="submit">
</form>
<br>

Add  a course:
<form action="/vm176/a3Maxime/addCourse.php" method="post">

<input type="submit">
</form>
<br>

Select a University:
<form action="/vm176/a3Maxime/universityInfo.php" method="post">
<?php
$query = "SELECT * FROM universities ORDER BY province ASC";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<select name='uniqueNumber'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " <option value='".$row['uniqueNumber']."'>".$row['officialName'] . "</option>";

}
mysqli_free_result($result);
echo "</select>";
?>
<input type="submit">
</form>
<br>
Select a province:

<form action="/vm176/a3Maxime/provinceInfo.php" method="post">
<?php
$query = "SELECT DISTINCT province FROM universities ORDER BY province ASC";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<select name='province'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " <option value='".$row['province']."'>".$row['province'] . "</option>";

}
mysqli_free_result($result);
echo "</select>";
?>
<input type="submit">
</form>
<br>

Select a Western Course to show Equivalence:
<form action="/vm176/a3Maxime/westernCourseInfo.php" method="post">
<?php
$query = "SELECT  courseNumber FROM WesternCourses";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<select name='courseNumber'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " <option value='".$row['courseNumber']."'>".$row['courseNumber'] . "</option>";

}
mysqli_free_result($result);
echo "</select>";
?>
<input type="submit">
</form>
<br>


Select a Date:
<form action="/vm176/a3Maxime/dateEquivalence.php" method="post">
<input   name="date" pattern="[0-9][0-9][0-9][0-9][-][0-9][0-9][-][0-9][0-9]" title="Enter a date of this format: 2015-05-12">

<input type="submit">
</form>
<br>

Add  an Equivalancey:
<form action="/vm176/a3Maxime/newEquivalence.php" method="post">

<input type="submit">
</form>
<br>



Universities with no Courses in system:<br>
<?php
$query = "SELECT  officialName, nickName FROM universities WHERE uniqueNumber NOT IN (SELECT Equivalent.uniqueNumber FROM Equivalent)";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row['officialName'] .  "<br>";
    echo "NickName: " . $row['nickName'] . "<br>";
}
mysqli_free_result($result);
?>
</body>
</html>
