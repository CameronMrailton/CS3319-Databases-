
<?php
//check submit assign variables
if($_POST['formSubmit'] == "Submit")
{
    $nameNum = $_POST['nameNum'];
    $order = $_POST['order'];
}
if($nameNum == 'courseNum' && $order == 'Asc'){
    $query = "SELECT * FROM WesternCourses ORDER BY courseNumber ASC";
}
elseif($nameNum == 'courseNum' && $order == 'Des'){
    $query = "SELECT * FROM WesternCourses ORDER BY courseNumber DESC";
}
elseif($nameNum == 'courseName' && $order == 'Asc'){
    $query = "SELECT * FROM WesternCourses ORDER BY courseName ASC";
}
elseif($nameNum == 'courseName' && $order == 'Des'){
    $query = "SELECT * FROM WesternCourses ORDER BY courseName DESC";
}
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "Course:";
    foreach ($row as $name => $value) {
    echo " $value<br />";
}
echo "<br>";
}
mysqli_free_result($result);
echo "</ol>";
?>


