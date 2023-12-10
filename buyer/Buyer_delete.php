<?php
include('connectDB.php');

if (isset($_GET['fruit_name'])) {
    $fruit_name = $_GET['fruit_name'];
    //delete the fruit from cart table
    $query = "DELETE FROM cart WHERE fruit_name='$fruit_name'";
    mysqli_query($conn, $query);
}

//redirect back to the previous page
header("Location: 04_Buyer_index.php");
?>