<!DOCTYPE html>
<html>
<head>
<title>universities</title>
</head>
<h1> University Information</h1>
<body>
<?php
include "connectDB.php";
    $num  = $_POST['uniqueNumber'];
$query = "SELECT * FROM universities WHERE uniqueNumber = '$num';";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $name => $value) {
    echo " $value<br />";
}

}
mysqli_free_result($result);
echo "</ol>";


$query = "SELECT courseName FROM OutsideCourses WHERE uniqueNumber = '$num';";
echo "Courses offered at univerity: "; 
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $name => $value) {
    echo " $value<br />";
}

}




echo "</ol>";
?>
</body>
</html>
