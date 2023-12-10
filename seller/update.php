<?php
include('connectDB.php');
$fid = $_GET['id'];

$kg = $_POST['kg'];
$purchase_p = $_POST['purchase_p'];
$sell_p = $_POST['sell_p'];

if ($sell_p > $purchase_p) {

    echo "1";
    mysqli_query($conn, "update `inventory` set  kg='$kg', purchase_p='$purchase_p', sell_p = '$sell_p' where fid='$fid'");
    //mysqli_query($conn, "update `inventory_image` set fruit_name = '$fruit_name' WHERE fid='$fid'");
    header('location:03_Admin_index.php');
} else {
    echo "Sorry, the purchase price $purchase_p RMB must be lower than the sell price $sell_p RMB.";
    echo "<br><a href ='edit.php?id=$fid'>Back</a>";
}

?>