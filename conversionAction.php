<?php
	$category = $unit = $rate= "";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, "test", 3306);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO conversionrate(category, unit, rate) VALUES($category,$unit,$rate)";
$res = mysqli_query($conn, $sql);

if ($res) {
	echo "Record updated successfully";
}
else {
	echo "Error occurred " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>