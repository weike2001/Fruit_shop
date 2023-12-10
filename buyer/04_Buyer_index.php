<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>
.div_M{
    width: 100%;
    height: 1500px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
    position: absolute;
    left: 0;
    top: 0;
}

.div_L{
    width: 370px;
    height: 380px;
    background-color: lightgrey;
    position: absolute;
    left: 38%;
    top: 140px;
}

.font_2{
    font-size: 50px;
}

.Orange{
    color: orange;
}
.table{
    background-color:#DFDBD8;
}
</style>
<div class="div_M">
<?php
include('connectDB.php');
$query_image = mysqli_query($conn, "select * from `inventory_image` ORDER BY fid ASC");
if (isset($_POST['add_to_cart'])) {
    $fruit_name = $_POST['fruit_name'];
    $kg = $_POST['kg'];
    //check whether the fruit is in inventory
    $check_query_invent = "SELECT * FROM inventory WHERE fruit_name='$fruit_name'";
    $check_result_invent = mysqli_query($conn, $check_query_invent);
    $number_line_invent=mysqli_num_rows($check_result_invent) ;

    //check whether the fruit is already in cart
    $check_query_cart = "SELECT * FROM cart WHERE fruit_name='$fruit_name'";
    $check_result_cart = mysqli_query($conn, $check_query_cart);
    $number_line_cart=mysqli_num_rows($check_result_cart) ;

    //if the user want to add a fruit which is in inventory and also in cart, output a warning message
    if ($number_line_invent>0 && $number_line_cart>0) {
    echo "<script>alert('The fruit is in the shopping cart!')</script>";
    } else if ($number_line_invent==0){
        //if the fruit is not in inventory, output a warning message
        echo "<script>alert('Sorry,the fruit you input $fruit_name is not in inventory.Please check!')</script>";
    }else {
         //otherwise add the fruit to shopping cart
        //get the unit price from inventory
        $row = mysqli_fetch_array($check_result_invent);
        $unit_price_per_kg = $row['sell_p'];
        //calculate the total price
        $total_price_per_fruit = $unit_price_per_kg * $kg;
        //insert into cart table
        $query = "INSERT INTO cart (fruit_name, kg, unit_price_per_kg, total_price_per_fruit) VALUES ('$fruit_name', $kg, $unit_price_per_kg, $total_price_per_fruit)";
        mysqli_query($conn, $query);
    }
}
?>

<h2 class="font_2 Orange">View and Buy Fruits</h2>
<div class="font_1">
 <table border="4" align="center" width="700px;" class="table">
 <thead>
 <th>fruit_name</th>
 <th>kg</th>
 <th>sell price per kg</th>
 <th>image</th>
 </thead>
 <tbody>
 <?php
 include('connectDB.php');
 $query = mysqli_query($conn, "select * from `inventory`ORDER BY fid ASC");
 while ($row = mysqli_fetch_array($query)) {
 ?>
    <tr>
        <td>
            <?php echo $row['fruit_name']; ?>
        </td>
        <td>
            <?php echo $row['kg']; ?>
        </td>
        <td>
            <?php echo $row['sell_p']; ?>
        </td>
        <td>
            <?php $row_image = mysqli_fetch_array($query_image) ?>
            <img width="100" height="100"src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row_image['image']); ?>">
        </td>
    </tr>
    <?php
 }
 ?>
 </tbody>
 </table>
</div>

<p class="font_1">Feel free to input the fruit name and weight you want to buy ^-^</p>
<form action="" method="post">
 <input type="text" class="input_1" name="fruit_name" placeholder="Fruit Name" required><br><br>&nbsp&nbsp
 <input type="text" class="input_1" name="kg" placeholder="kg"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  required> kg<br><br>
 <input type="submit" class="input_2" name="add_to_cart" value="Add to Cart">
</form>
<br>

<h2 class="font_1">Shopping Cart</h2>
<div class="font_1">
<table border="4" align="center">
 <thead>
 <tr>
 <th>Fruit Name</th>
 <th>Weight (kg)</th>
 <th>unit price per kg</th>
 <th>total price per fruit</th>
 <th>Operation</th>
 </tr>
 </thead>
 <tbody>
 <?php
               $query = "SELECT * FROM cart";
               $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['fruit_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['kg']; ?>
                        </td>
                        <td>
                            <?php echo $row['unit_price_per_kg']; ?>
                        </td>
                        <td>
                            <?php echo $row['total_price_per_fruit']; ?>
                        </td>
                        <td>
                        <a href="Buyer_edit.php?fruit_name=<?php echo $row['fruit_name']; ?>">Edit</a>
                       <a href="Buyer_delete.php?fruit_name=<?php echo $row['fruit_name']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
 <form action="04_receipt_buy.php" method="post">
 <input type="submit" class="input_2" name="submit" value="Buy">
<br><br>
 </form>
 </tbody>
</table>

<hr><br>Back to <a href="01_Login.php">Login Page</a>
</div>

<?php
mysqli_close($conn);
?>
</div>
