<!DOCTYPE html>
<html>
<head>
<title>delete</title>
</head>
<body>
<?php
include "connectDB.php";
$number = $_POST['courseNumber'];
$query = "SELECT * FROM Equivalent WHERE uniqueNumber = '$number';";
$result = mysqli_query($connection,$query);
if(!result){
die("Error while checking western course for equivalent courses" . mysqli_error($connection));
}
else{
if(!mysqli_fetch_row($result) == NULL){
	echo "This western course has equivalent outside courses, are you sure you want to delete?";	
}
else
{
        echo "This western course has no equivalent outside courses, are you sure you want to delete?";
}

mysqli_free_result($result);
}
?>

<form action "deleteCourse.php" method="post">
For course: <input type="text" name="courseNumber" value =<?php echo $_POST['courseNumber']; ?> readonly><br>
 Yes!<input type="radio" name="yesNo" value = "Yes"> <br/>
 No!<input type="radio" name="yesNo" value = "No"> <br/>
 <input type="submit" name="deleteForm" value="Submit">
</form>

<?php 
if($_POST['deleteForm'] == "Submit"){

	include "connectDB.php";
	$number = $_POST['courseNumber'];
	$yesNo = $_POST['yesNo'];
	if($_POST['yesNo'] == "Yes"){
		$query = "DELETE FROM Equivalent WHERE courseNumber='$number';";
		echo $query;		
		$result = mysqli_query($connection,$query);
		if(!$result){

			die("Error while deleting" . mysqli_error($connection));

		}
		mysqli_free_result($result);

	
		$query = "DELETE FROM WesternCourses WHERE courseNumber='$number';";
		echo $query;
		$result = mysqli_query($connection,$query);
                if(!$result){

                        die("Error while deleting" . mysqli_error($connection));

                }
                mysqli_free_result($result);
		header('Location: assignment3.php');

	}

	elseif($_POST['yesNo'] == "No"){
		header('Location: assignment3.php');
	}
}
?>
</body>
</html>

