<?php
include('connectDB.php');

$fruit_name = $_POST['f_name'];
$kg = $_POST['kg'];
$purchase_p = $_POST['purchase_p'];
$sell_p = 2 * $purchase_p;

$sql = "SELECT * FROM inventory WHERE fruit_name = lower('$fruit_name')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "Oops, $fruit_name already exists!";
	//echo "<script>alert('Oops, $fruit_name already exists!');</script>";
	echo "<br> <a href = '03_Admin_index.php'>Back</a>";
} else {
	mysqli_query($conn, "insert into `inventory` (fid, fruit_name, kg, purchase_p, sell_p) values (NULL, '$fruit_name','$kg', '$purchase_p', '$sell_p')");
	mysqli_query($conn, "insert into `inventory_image` (fid, fruit_name, image) values (NULL, '$fruit_name', '')");
	header('location: 03_Admin_index.php');
	header('location: 10_view_image.php');
}


?>