<!DOCTYPE html>
<html>
<head>
<title>add new Course</title>
</head>
<body>
<h1> Add New Course</h1>
<form action= "addCourse.php" method="post">
What is the courseNumber? <input  id="coursenum" name="courseNumber" pattern="[C][S][0-9]{4}"><br>
What is the name?<input type="text" name="name"><br>
What is the weight?<input type="text" name="weight"><br>
What is the suffix?<input type="text" name="suffix"><br>
<input type="Submit" name="test" value="Submit">
</form>

<?php
include "connectDB.php";
if($_POST['test'] == "Submit"){
$name = $_POST['name'];
$weight = $_POST['weight'];
$suffix = $_POST['suffix'];
$number = $_POST['courseNumber'];
$uniqueCheck = "SELECT courseNumber FROM WesternCourses WHERE courseNumber='$number';";
$result = mysqli_query($connection,$uniqueCheck);
if(!$result){
	die("error whuile checking if coursenumber unique" . mysqli_error($connection));
}	
if(  ($weight == "0.5" or $weight == "1.0") and( $suffix == "A/B" or $suffix =="F/G" or $suffix =="E" or $suffix == "Y" or $suffix == "Z" or $suffix == NULL) and ($name != "")){
	$query = "INSERT INTO WesternCourses (courseNumber,courseName,courseWeight,courseSuffix) VALUES ('$number','$name','$weight','$suffix');";
	if(!mysqli_query($connection,$query)){
		die("error while edditing Western course(course not unique" . mysqli_error($connection)) ."<br>";
		echo "Try another course";
	}
	else{
		header('Location:assignment3.php');
	}
}
else{
	echo "<br>";
	echo "Incorect weight, suffix, name or course number,<br>Enter Feilds again";
}
} 


?>
</body>
</html>

