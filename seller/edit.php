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
    height: 410px;
    background-color: lightgrey;
    position: absolute;
    left: 38%;
    top: 150px;
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
$fid = $_GET['id'];
$query = mysqli_query($conn, "select * from `inventory` where fid='$fid'");
$row = mysqli_fetch_array($query);

$temp = mysqli_query($conn, "select fruit_name from `inventory` where fid='$fid'");
$temp1 = mysqli_fetch_row($temp)[0];

echo "Edit $temp1";
?>
</div>
<br>
<!DOCTYPE html>
<html>

<body>

	<form method="POST" action="update.php?id=<?php echo $fid; ?>">
		<input type="text" class="input_1"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  value="<?php echo $row['kg']; ?>" name="kg" placeholder="kg"> <br>kg<br><br>
		<input type="text" class="input_1"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  value="<?php echo $row['purchase_p']; ?>" name="purchase_p" placeholder="Purchase Price">
		<br>RMB(Purchase Price per kg)<br><br>
		<input type="text" class="input_1"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  value="<?php echo $row['sell_p']; ?>" name="sell_p" placeholder="Sell Price"><br>RMB(Sell
		Price per kg)<br><br>
		<input type="submit" class="input_2" value="Edit"><br>
		<p class="font_2"><a href="03_Admin_index.php">Back</a></p;>
	</form>
</body>
</div>
</div>
</html>