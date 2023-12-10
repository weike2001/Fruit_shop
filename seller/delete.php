<?php
$fid = $_GET['id'];
include('connectDB.php');

$temp = mysqli_query($conn, "select fruit_name from `inventory` where fid='$fid'");
$temp1 = mysqli_fetch_row($temp)[0];

$sql = "DELETE inventory, inventory_image
        from inventory INNER JOIN inventory_image 
        where inventory.fruit_name = inventory_image.fruit_name 
        And inventory.fruit_name ='$temp1'";

mysqli_query($conn, $sql);
//mysqli_query($conn, "delete from `inventory_image` where fid='$fid'");
header('location:03_Admin_index.php');
//header('location: 10_view_image.php');
?>