
<!DOCTYPE html>
<html>
<head>
<title>add new Course</title>
</head>
<body>
<h1> update course info</h1>
<form method="post">
For course: <input type="text" name="courseNumber" value =<?php echo $_POST['courseNumber']; ?> readonly><br>
What is the name:<input type="text" name="name"><br>
What is the weight?<input type="text" name="weight"><br>
What is the suffix?<input type="text" name="suffix"><br>
<name="courseNumber" value=<?php $_POST['courseNumber'] ?> >
<input type="Submit" name="test" value="Submit">
</form>
<?php
include "connectDB.php";
if($_POST['test'] == "Submit"){
$name = $_POST['name']; 
$weight = $_POST['weight'];
$suffix = $_POST['suffix'];
$number = $_POST['courseNumber'];
if(($weight == "0.5" or $weight == "1.0") and( $suffix == "A/B" or $suffix =="F/G" or $suffix =="E" or $suffix == "Y" or $suffix == "Z" or Suffix == "") and ($name != "")){
$query = "UPDATE WesternCourses SET courseName='$name',courseWeight='$weight',courseSuffix= '$suffix' WHERE courseNumber ='$number';";
if(!mysqli_query($connection,$query)){
die("error while edditing Western course" . mysqli_error($connection));
}
else{
header('Location:assignment3.php');
}
}
else{
echo "<br>";
echo "Incorect weight, suffix or name,<br>Enter Feilds again";
}

}
?>
</body>
</html>
