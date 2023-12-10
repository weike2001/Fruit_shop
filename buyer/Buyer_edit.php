<?php
include('connectDB.php');

if (isset($_GET['fruit_name'])) {
    $fruit_name = $_GET['fruit_name'];
    //get the fruit information from cart table
    $query = "SELECT * FROM cart WHERE fruit_name='$fruit_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $kg = $row['kg'];
    $unit_price_per_kg = $row['unit_price_per_kg'];
    $total_price_per_fruit = $row['total_price_per_fruit'];
}

if (isset($_POST['update'])) {
    $fruit_name = $_POST['fruit_name'];
    $kg = $_POST['kg'];
    //calculate the new total price
    $total_price_per_fruit = $unit_price_per_kg * $kg;
    //update the fruit information in cart table
    $query = "UPDATE cart SET kg=$kg, total_price_per_fruit=$total_price_per_fruit WHERE fruit_name='$fruit_name'";
    mysqli_query($conn, $query);
    //redirect back to the previous page
    header("Location: 04_Buyer_index.php");
}
?>

<h2>Edit Fruit</h2>
<form action="" method="post">
 <input type="hidden" name="fruit_name" value="<?php echo $fruit_name; ?>">
 <label>Fruit Name:</label><br>
 <input type="text" name="fruit_name" value="<?php echo $fruit_name; ?>" disabled><br>
 <label>Weight (kg):</label><br>
 <input type="text" name="kg" value="<?php echo $kg; ?>"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  required> kg<br><br>
 <input type="submit" name="update" value="Update">
</form>

<hr><br>Back to <a href="04_Buyer_index.php">Buyer Page</a>

<?php
mysqli_close($conn);
?>