<!DOCTYPE html>
<html>
<head>
<title>add new Course</title>
</head>
<body>
<h1> Add New Equivalence</h1>
<form action= "newEquivalence.php" method="post">
What is the Western Course's courseNumber? <input  id="courseNumber" name="courseNumber" pattern="[C][S][0-9]{4}"><br>
What is the Outside Course's courseNumber? <input  id="coursenum" name="code" pattern="[C][o][m][p][S][c][i][[0-9]{3}"><br>
What is the Outside Course's uni's unique number? <input  id="uniqueNum" name="uniqueNum" pattern="[0-9]{1,2}"><br>

<input type="Submit" name="test" value="Submit">
</form>

<?php
include "connectDB.php";
if($_POST['test'] == "Submit"){
$date = date("Y-m-d");
$code = $_POST['code'];
$number = $_POST['courseNumber'];
$uniqueNum = $_POST['uniqueNum'];
$uniqueCheck = "SELECT courseNumber,uniqueNumber FROM Equivalent WHERE courseNumber='$number' and code='$code';";
$result = mysqli_query($connection,$uniqueCheck);
if(!$result){
        die("error while checking if coursenumber unique" . mysqli_error($connection));
}
if(mysqli_fetch_assoc($result) == NULL){
	echo $query;
 	$query = "INSERT INTO Equivalent Values('$number','$code','$uniqueNum' ,'$date');";
        if(!mysqli_query($connection,$query)){
                die("OutSide course or western course does not exist" . mysqli_error($connection)) ."<br>";
        }
        else{
	}
}
else{
	$query = "UPDATE Equivalent SET equivalentDate='$date' WHERE code='$code';";
        if(!mysqli_query($connection,$query)){
                die("error while updating equivalence" . mysqli_error($connection)) ."<br>";
        }
        else{
             }

}
}
?>
</body>
</html>

