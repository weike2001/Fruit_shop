<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>
.div_M{
    width: 100%;
    height: 1000px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
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
	font-size: 30px;
}

.red{
	color: red;
}
</style>

<div class="div_M">
	<div class="div_L" class="font_1">
		<div class="font_2 red">
<?php
include('connectDB.php');
//to get id
$sid = $_GET['id'];
$query = mysqli_query($conn, "select * from `shoppinglist` where sid='$sid'");
$row = mysqli_fetch_array($query);

$temp = mysqli_query($conn, "select fruit_name from `shoppinglist` where sid='$sid'");
//to the name of the fruit
$temp1 = mysqli_fetch_row($temp)[0];

echo "Edit $temp1";
?>
</div>

<body>

	<form method="POST" action="seller_update.php?id=<?php echo $sid; ?>">
        <p class="font_1">please edit amount that you want to buy:</p><br>
		<input type="text" class="input_1"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  value="<?php echo $row['kg']; ?>" name="kg" placeholder="kg"> kg<br><br>
		<input type="submit" class="input_2" value="Edit"><br><br>
		<p class="font_2"><a href="06_Seller_index.php">Back</p></a>
	</form>
</body>
</div>
</div>
</html>