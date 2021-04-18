<!DOCTYPE html>
<html>
<head>
<title>provinces</title>
</head>
<body>
<?php
include "connectDB.php";
    $province  = $_POST['province'];

$query = "SELECT * FROM universities WHERE province = '$province';";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo "Univesities from: " . $province;

echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
        echo "official Name: " . $row['officialName'] . "<br>";
	echo "nickName: " . $row['nickName'] . "<br>";
	echo "<br>";
}


mysqli_free_result($result);
echo "</ol>";
?>
</body>
</html>

