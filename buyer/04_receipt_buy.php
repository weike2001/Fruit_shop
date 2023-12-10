<?php
include('connectDB.php');

$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);
$results = mysqli_query($conn, "SELECT fruit_name, kg FROM cart");

//get the number of rows to check whether ths shopping cart is empty,
$query_judge = "SELECT * FROM cart";
$result_judge = mysqli_query($conn, $query);
$num=mysqli_num_rows($result_judge);

$amount_total=0;
$fruit_cashflow="";
$net_cashflow=0;

//if the cart is empty, output a warning message
if ($num==0){
 echo "Your shopping cart is empty, please buy some fruits.";
}else{
 // Add a variable to track whether the purchase time has been printed
 $purchase_time_printed = false;
 while ($row = mysqli_fetch_assoc($results)) {
 $fruit_name = $row['fruit_name'];
 $kg = $row['kg'];
 $judge = mysqli_query($conn, "SELECT sell_p FROM inventory WHERE fruit_name = lower('$fruit_name')");

 $result = mysqli_query($conn, "SELECT sell_p FROM inventory WHERE fruit_name = lower('$fruit_name')");
 $result1 = mysqli_query($conn, "SELECT kg FROM inventory WHERE fruit_name = lower('$fruit_name')");
 $result2 = mysqli_query($conn, "SELECT amount FROM cash_tracker");

 $sell_p = mysqli_fetch_row($result)[0];
 $kg_inventory = mysqli_fetch_row($result1)[0];
 $amount_original = mysqli_fetch_row($result2)[0];

 if ($kg > $kg_inventory) {
 echo "Sorry, the inventory does not have $kg kg $fruit_name.";
 echo " Note that the inventory only have $kg_inventory kg $fruit_name.";
 } else {
 $temp = $kg_inventory - $kg;
 $temp1 = $kg * $sell_p;
 $temp2 = $amount_original + $temp1;
 mysqli_query($conn, "update `inventory` set kg='$temp' WHERE fruit_name='$fruit_name'");
 mysqli_query($conn, "update `cash_tracker` set amount = '$temp2'");
 // Only print the purchase time once
 if (!$purchase_time_printed) {
 echo date("Y/m/d") . "<br>";
 // Set the variable to true after printing the purchase time
 $purchase_time_printed = true;
 }
 // Add a line break after printing each fruit's purchase information
 echo "Thanks for buying " . $fruit_name . " " . $kg . " kg, in total ￥$temp1.<br>";
 echo "Note that $fruit_name per kg price is $sell_p.<br>";
 //splice the name and weight of the fruit into a long string
 $fruit_cashflow.="$fruit_name:$kg kg; ";
 //calculate the cash flow and total price
$result = mysqli_query($conn, "SELECT * FROM cash_flow ORDER BY date");
$temp = mysqli_fetch_row($result)[4];
$amount_total+=$kg *$sell_p;
 }
 }
}
//if the shopping cart is not empty, in other words, the buyer buy some fruits, insert the buying record to the table named cash_flow
if ($amount_total!=0){
 //update the amount of cash flow in table cash_tracker
$result2 = mysqli_query($conn, "SELECT amount FROM cash_tracker");
$net_cashflow= mysqli_fetch_row($result2)[0];
mysqli_query($conn,"insert into `cash_flow` (cfid, date, fruit_name, price, net_cashflow) values (cfid,NOW(),'$fruit_cashflow', '$amount_total', '$net_cashflow')");
}
mysqli_query($conn,"DELETE FROM cart");
echo "<br><hr><br>Go back to <a href='04_Buyer_index.php'>Buyer Main Page</a>";
?>