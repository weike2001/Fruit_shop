<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>
.div_M{
    width: 100%;
    height: 950px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
    position: relative;
    top:0;
    left:0;
}

.div_L{
    width: 370px;
    height: 380px;
    background-color: #DFDBD8;
    position: absolute;
    left: 38%;
    top: 140px;
    font-size: 25px;
}

.div_R{
    width: 150px;
    height: 150px;
    border-radius: 75px;
    background: url(watermelon_picture.jpg) 0 0 / 100% 100%;
    background-size: 100% 100%;
    animation: move 6s linear infinite alternate;
    position: absolute;
    top: 600px;
    left: 700px;
}

@keyframes move{
    to{
        transform: translate(-700%, 0) rotate(1turn);
    }
}

.div_O{
    width: 150px;
    height: 150px;
    border-radius: 75px;
    background: url(colorful.jpg) 0 0 / 100% 100%;
    background-size: 100% 100%;
    animation: Orange 6s linear infinite alternate;

    position: absolute;
    top: 600px;
    left: -550px;
}

@keyframes Orange{
    to{
        transform: translate(900%, 0) rotate(1turn);
    }
}
</style>

<div class="div_M">
<div class="div_L">
<div class="div_R"></div>
<div class="div_O"></div>
<?php
include('connectDB.php');

$submit = $_POST['submit'];//to match the button
$fruit_cashflow="";
if($submit != "Sell All")
{
    $fruit_name = $_POST['fruit_name'];
    $kg = $_POST['kg'];

    $judge = mysqli_query($conn, "SELECT * FROM inventory WHERE fruit_name = lower('$fruit_name')");

    if ($judge->num_rows > 0)
    {
        if($submit == "Sell Directly")
        {
            //select the purchase price from datebase
            $result = mysqli_query($conn, "SELECT purchase_p FROM inventory WHERE fruit_name = lower('$fruit_name')");
            //select inventory from database
            $result1 = mysqli_query($conn, "SELECT kg FROM inventory WHERE fruit_name = lower('$fruit_name')");
            //select the cash amount from database
            $result2 = mysqli_query($conn, "SELECT amount FROM cash_tracker");


            $purchase_p = mysqli_fetch_row($result)[0];
            $kg_inventory = mysqli_fetch_row($result1)[0];
            $amount_original = mysqli_fetch_row($result2)[0];

            if ($purchase_p * $kg > $amount_original && $kg <= 100)
            {
                echo "Sorry, we do not have much money to purchase $kg kg $fruit_name for per kg $purchase_p RMB.";
            }
            else
            {
                if ($kg > 100)
                {
                    echo "Sorry, the weight $kg is more than 100kg, we do not accept it.";
                }
                else
                {
                    $temp = $kg_inventory + $kg;
                    $temp1 = $kg * $purchase_p;
                    $temp2 = $amount_original - $temp1;
                    //update the table
                    mysqli_query($conn, "update `inventory` set kg='$temp' WHERE fruit_name='$fruit_name'");
                    //update the table, too.
                    mysqli_query($conn, "update `cash_tracker` set amount = '$temp2'");
                    echo "<h3>Receipt</h3>";
                    echo  "Sold " .$fruit_name. "&nbsp" . $kg . " kg, the price is " . $purchase_p . " RMB pre kg, in total $temp1 RMB.<br>";
                    echo "You have sold 1 kind of fruit. Totally $temp1 RMB.";
                    echo "<br>Thanks for selling &nbsp&nbsp".date("Y/m/d");

                    $result = mysqli_query($conn, "SELECT * FROM cash_flow ORDER BY cfid DESC LIMIT 1");
                    $temp = mysqli_fetch_row($result)[4];
                    $price=$kg * $purchase_p;
                    //splice the name and weight of the fruit into a long string
                    $fruit_cashflow.="$fruit_name:$kg kg;   ";
                    //insert the selling record to the table named cash_flow which will be used to show in admin page
                    mysqli_query($conn, "insert into `cash_flow` (cfid, date, fruit_name, price, net_cashflow) values (cfid, NOW(), '$fruit_cashflow','-$price', '$temp2')");
                }
            }
        }
        else if($submit == "Add to shopping list")
        {
            //select the purchase price
            $result3 = mysqli_query($conn, "SELECT purchase_p FROM inventory WHERE fruit_name = lower('$fruit_name')");
            //select the cash amount
            $result4 = mysqli_query($conn, "SELECT amount FROM cash_tracker");
            //select the fruit
            $result = mysqli_query($conn, "SELECT fruit_name FROM shoppinglist WHERE fruit_name = lower('$fruit_name')");
            $purchase_pr = mysqli_fetch_row($result3)[0];
            $amount_original2 = mysqli_fetch_row($result4)[0];
            $total = $purchase_pr*$kg;

            if(mysqli_num_rows($result) > 0)//check if the correct fruit name to be input
            {
                echo "$fruit_name has been added to shopping list.<br>You can edit it in the shopping list.";
            }
            else
            {
                if ($total > $amount_original2 && $kg <= 100)
                {
                    echo "Sorry, we do not have much money to purchase $kg kg $fruit_name for per kg $purchase_pr RMB.";
                }
                else
                {
                    if ($kg > 100)
                    {
                        echo "Sorry, the weight $kg is more than 100kg, we do not accept it.";
                    }
                    else
                    {
                        mysqli_query($conn, "insert into `shoppinglist` (sid, fruit_name, kg, unit_p, total_p) values (NULL, '$fruit_name', '$kg', '$purchase_pr', '$total')");
                        header('location: 06_Seller_index.php');
                    }
                }
            }
        }
    }
    else
    {
        echo "Sorry, the fruit you input $fruit_name is not in inventory! Please check.";
    }
}
else//multi-buy situation
{
    $amount_total = 0;
    //select name
    $results = mysqli_query($conn, "SELECT fruit_name from shoppinglist");

    $num = mysqli_num_rows($results);
    //calculate the number of fruit kind
    $num_kind=0;
    if($num > 0)
    {
        echo "<h3>Receipt</h3>";
        while($row = mysqli_fetch_assoc($results))//use loop
        {
            $fruit = $row["fruit_name"];
            //select kg and total price from shoppinglist table
            $result = mysqli_query($conn, "SELECT kg, total_p from shoppinglist where fruit_name = '$fruit'");
            //select inventory
            $result1 = mysqli_query($conn, "SELECT kg FROM inventory WHERE fruit_name = lower('$fruit')");
            //select the cash amount
            $result4 = mysqli_query($conn, "SELECT amount FROM cash_tracker");
            $amount_original2 = mysqli_fetch_row($result4)[0];
            $kg_inventory = mysqli_fetch_row($result1)[0];
            $row2 = mysqli_fetch_assoc($result);
            //to get each row value
            $kg2 = $row2["kg"];
            $total = $row2["total_p"];
            $temp = $kg_inventory + $kg2;
            $temp2 = $amount_original2 - $total;
            //count the total price
            $amount_total += $total;

            if($amount_total < $amount_original2)
            {
                $result3 = mysqli_query($conn, "SELECT purchase_p FROM inventory WHERE fruit_name = lower('$fruit')");
                $purchase_p = mysqli_fetch_row($result3)[0];
                //update one by one
                mysqli_query($conn, "update `inventory` set kg='$temp' WHERE fruit_name='$fruit'");
                mysqli_query($conn, "update `cash_tracker` set amount = '$temp2'");
                echo  "Sold " . $fruit. "&nbsp" . $kg2 . " kg, the price is " . $purchase_p . "RMB pre kg, in total $total RMB.<br>";
                //add one to the number of fruit kind
                $num_kind++;
                //splice the name and weight of the fruit into a long string
                $fruit_cashflow.="$fruit:$kg2 kg;   ";
            }
            else
            {
                echo "Sorry, we do not have much money to purchase all fruits.";
                //Because there are fruits that are not successfully sold, delete the number of price
                $amount_total -= $total;
                break;
            }
        }

        echo "You have sold $num_kind kinds of fruits. Totally $amount_total RMB.";
        echo "<br>Thanks for selling &nbsp&nbsp".date("Y/m/d");
        $net= mysqli_query($conn, "SELECT amount FROM cash_tracker");
        $net_cashflow = mysqli_fetch_row($net)[0];
        //insert the selling record to the table named cash_flow, which will be used to show in admin page
        mysqli_query($conn,"insert into `cash_flow` (cfid, date, fruit_name, price, net_cashflow) values (cfid,NOW(),'$fruit_cashflow', '-$amount_total', '$net_cashflow')");
        $sqldel = "DELETE from shoppinglist";
        mysqli_query($conn,$sqldel);
    }
    else
    {
        //if the shopping list is empty, but you click it
        echo "This shopping list is empty!Please add fruits to shopping list first!";
    }
}

echo "<br><hr><br>Go back to <a href = '06_Seller_index.php'>Seller Main Page</a>";
?>
</div>
</div>
