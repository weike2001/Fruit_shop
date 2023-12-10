<?php
$sid = $_GET['id'];
include('connectDB.php');

$temp = mysqli_query($conn, "select fruit_name from `shoppinglist` where sid='$sid'");
$temp1 = mysqli_fetch_row($temp)[0];
//after selling fruits, delect all data from the table 
$sql = "DELETE from shoppinglist where fruit_name = '$temp1'";

mysqli_query($conn, $sql);
header('location:06_Seller_index.php');
?>