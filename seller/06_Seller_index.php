<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>
.div_M{
    width: 100%;
    height: 1900px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
    position: absolute;
    top:0;
    left:0;
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
    color: red;
}

.font_1 {
    font-size: 25px;
}

.table{
background-color:#DFDBD8;
font-size: 25px;
}
</style>

<body>
<div class="div_M">
    <h2 class="font_2">View and Sell Fruits</h2>
    <div>
        <table border="4" align="center" class="table" width="800">
            <thead>
                <th>fruit_name</th>
                <th>kg</th>
                <th>purchase price per kg</th>
                <th>image</th>
            </thead>
            <tbody>
                <?php
                include('connectDB.php');
                $query = mysqli_query($conn, "select * from `inventory`ORDER BY fid ASC");
                //select the picture from table inventory_image
                $query_image = mysqli_query($conn, "select * from `inventory_image` ORDER BY fid ASC");
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
                            <?php echo $row['purchase_p']; ?>
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
    <p class="font_1">Feel free to input the fruit name and weight you want to sell ^-^</p>
    <p class="font_1">Note that the maximun weight per order we accepted is 100kg. And due to the cash flow limitation, the
        unaffordable order is not accepted.</p>
    <form action="06_receipt_seller.php" method="post">
        <input type="text" class="input_1" name="fruit_name" placeholder="Fruit Name" required><br><br>&nbsp&nbsp&nbsp
        <input type="text" class="input_1" name="kg" placeholder="kg"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$"  required> kg<br><br><br>
        <input type="submit" class="input_2" name="submit" value="Add to shopping list">&nbsp &nbsp
        <input type="submit" class="input_2" name="submit" value="Sell Directly">
    </form>
    <br>
<div class="font_1">
    <h2>Shopping List</h2>
    <div>
        <table border="4" align="center" width="800">
            <thead>
                <th>fruit_name</th>
                <th>kg</th>
                <th>unit price per kg</th>
                <th>total price per fruit</th>
                <th>Operation</th>
            </thead>
            <tbody>
                <?php
                include('connectDB.php');
                $query = mysqli_query($conn, "select * from `shoppinglist` ORDER BY sid ASC");
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
                            <?php echo $row['unit_p']; ?>
                        </td>
                        <td>
                            <?php echo $row['total_p']; ?>
                        </td>
                        <td>
                            <a href="seller_edit.php?id=<?php echo $row['sid']; ?>">Edit</a>
                            <a href="seller_delete.php?id=<?php echo $row['sid']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<br>
    <form action="06_receipt_seller.php" method="post">
        <input type = "submit" class="input_2" name = "submit" value = "Sell All">
    </form>

</body>
<hr><br>Back to <a href="01_Login.php">Login Page</a>
</div>
</div>
