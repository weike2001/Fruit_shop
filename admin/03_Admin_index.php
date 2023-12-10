<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>
.div_M{
    width: 100%;
    height: 1800px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
}

.div_L{
    width: 100%;
    height: 400px;
    background-color: yellow;
}

.div_B{
position: absolute;
left: 38%;
top: 140px;
}

.red {
    color: red;
}

.blue {
    color: blue;
}

.purple {
    color: purple;
}
.table{
    background-color:#DFDBD8;
}
</style>
<div class="div_M">
<div class="div_L">
<div class="purple font_1">
<?php
include "connectDB.php";
$result = mysqli_query($conn, "SELECT amount FROM cash_tracker");
$temp = mysqli_fetch_row($result)[0];

echo "Important Info: The system net cash flow is $temp RMB now!";
?>
</div>
<body>


        <h1>Add Fruits</h1>
        <p class="font_1 red">When adding the fruit, we initial the selling price as double as the purchase price.</p>
        <form method="POST" action="add.php">
            <input type="text" class="input_1" name="f_name" placeholder="Fruit Name" required><br><br>&nbsp &nbsp
            <input type="text" class="input_1" name="kg"  pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$" placeholder="kg" required> <label class="blue">kg</label><br><br>
            <input type="text" class="input_1" name="purchase_p" pattern="^[1-9]\d*(\.\d+)?$|^0\.\d*[1-9]\d*$" placeholder="Purchase Price" required><br><p class="font_2 red"> RMB(Purchase Price per
            kg)</p>

            <input type="submit" class="input_2" value="Add">
        </form>

    </div>
    <br>
    <h1>Edit Fruits</h1>
    <div class="font_1">
        <table border="4" align="center" class="table">
            <thead>
                <th>fruit_name</th>
                <th>kg</th>
                <th>purchase price per kg</th>
                <th>sell price per kg</th>
                <th>image</th>
                <th>Operation</th>
            </thead>
            <tbody>
                <?php
                include('connectDB.php');
                $query = mysqli_query($conn, "select * from `inventory`ORDER BY fid ASC");
                //select the image from table
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
                            <?php echo $row['sell_p']; ?>
                        </td>
                        <td>
                            <?php $row_image = mysqli_fetch_array($query_image) ?>
                          <img width="100" height="100"src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row_image['image']); ?>">
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['fid']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['fid']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <hr><br><p class="font_1">Back to <a href="01_Login.php">Login Page</a></p>
    <p class="font_1">Turn to <a href="10_view_image.php">Picture Page</a></p><br>

    <div class="font_1">
        <h3>Statement of cash flow</h3>
        <table border="4" align="center" class="table">
            <thead>
                <th>datetime</th>
                <th>fruit name and weight</th>
                <th>total price</th>
                <th>net_cashflow</th>
            </thead>
            <tbody>
                <?php
                include "connectDB.php";
                $query = mysqli_query($conn, "select * from `cash_flow`ORDER BY date ASC");
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['date']; ?>
                        </td>
                        <td>
                            <?php echo $row['fruit_name']; ?>
                        </td>
                        <td>
                            <?php
                            if ($row['price']>0){
                                echo  "+".$row['price'];
                            }
                            else{
                                echo $row['price'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $row['net_cashflow']; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
    </div>
</body>

</div>

