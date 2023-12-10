<?php
include('connectDB.php');
$sid = $_GET['id'];
$kg = $_POST['kg'];

$result = mysqli_query($conn, "SELECT fruit_name FROM shoppinglist WHERE sid = '$sid'");
$fruit = mysqli_fetch_row($result)[0];
$result2 = mysqli_query($conn, "SELECT purchase_p FROM inventory WHERE fruit_name = '$fruit'");
$purchase_p = mysqli_fetch_row($result2)[0];

if ($kg <= 100)//cannot bigger than 100
{
    $total = $kg*$purchase_p;
    //to update the value of kg, total price
    mysqli_query($conn, "update `shoppinglist` set  kg='$kg', unit_p='$purchase_p', total_p = '$total' where sid='$sid'");
    header('location:06_Seller_index.php');
} else 
{
    echo "Sorry, $kg cannot more than 100. please check!";
    echo "<br><a href ='seller_edit.php?id=$sid'>Back</a>";
}

?>