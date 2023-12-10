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
    width: 280px;
    height: 340px;
    background-color: lightgrey;
    position: absolute;
    left: 40%;
    top: 140px;
}

.font_2{
    font-size: 25px;
}

.loader_1{
     position: absolute;
     top:240px;
     left:6%;
     transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;
    perspective 600px;
    background: lightblue;
transform: rotateZ(15deg);
}

.loader_1 span{
    position: absolute;
    border: 10px solid pink;
    border-radius: 4px;
    left:0;
    top: 0;
}

.loader_1 span:before{
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 10px;
    height: 50%;
    background: lightgreen;
}

.loader_1 span:after{
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 10px;
    height: 50%;
    background: yellow;
}

.loader_1 span:nth-child(1){
    top:0;
    left:0;
    right: 0;
    bottom: 0;
    animation: animate 8s linear infinite;
}

.loader_1 span:nth-child(2){
    top:20px;
    left:20px;
    right: 20px;
    bottom: 20px;
    animation: animate 4s linear infinite;

}

.loader_1 span:nth-child(3){
    top:40px;
    left:40px;
    right: 40px;
    bottom: 40px;
}

.loader_2{
     position: absolute;
     top:450px;
     left:25%;
     transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;
    perspective 600px;
    background: lightyellow;
transform: rotateZ(30deg);
}

.loader_2 span{
    position: absolute;
    border: 10px solid orange;
    border-radius: 4px;
    left:0;
    top: 0;
}

.loader_2 span:before{
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 10px;
    height: 50%;
    background: red;
}

.loader_2 span:after{
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 10px;
    height: 50%;
    background: lightblue;
}

.loader_2 span:nth-child(1){
    top:0;
    left:0;
    right: 0;
    bottom: 0;
    animation: animate 8s linear infinite;
}

.loader_2 span:nth-child(2){
    top:20px;
    left:20px;
    right: 20px;
    bottom: 20px;
    animation: animate 4s linear infinite;

}

.loader_2 span:nth-child(3){
    top:40px;
    left:40px;
    right: 40px;
    bottom: 40px;
}

.loader_3{
     position: absolute;
     top:600px;
     left:45%;
     transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;
    perspective 600px;
    background: black;
transform: rotateZ(45deg);
}

.loader_3 span{
    position: absolute;
    border: 10px solid lightgreen;
    border-radius: 4px;
    left:0;
    top: 0;
}

.loader_3 span:before{
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 10px;
    height: 50%;
    background: blue;
}

.loader_3 span:after{
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 10px;
    height: 50%;
    background: red;
}

.loader_3 span:nth-child(1){
    top:0;
    left:0;
    right: 0;
    bottom: 0;
    animation: animate 8s linear infinite;
}

.loader_3 span:nth-child(2){
    top:20px;
    left:20px;
    right: 20px;
    bottom: 20px;
    animation: animate 4s linear infinite;

}

.loader_3 span:nth-child(3){
    top:40px;
    left:40px;
    right: 40px;
    bottom: 40px;
}

.loader_4{
     position: absolute;
     top:450px;
     left:65%;
     transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;
    perspective 600px;
    background: white;
transform: rotateZ(60deg);
}

.loader_4 span{
    position: absolute;
    border: 10px solid lightblue;
    border-radius: 4px;
    left:0;
    top: 0;
}

.loader_4 span:before{
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 10px;
    height: 50%;
    background: red;
}

.loader_4 span:after{
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 10px;
    height: 50%;
    background: purple;
}

.loader_4 span:nth-child(1){
    top:0;
    left:0;
    right: 0;
    bottom: 0;
    animation: animate 8s linear infinite;
}

.loader_4 span:nth-child(2){
    top:20px;
    left:20px;
    right: 20px;
    bottom: 20px;
    animation: animate 4s linear infinite;

}

.loader_4 span:nth-child(3){
    top:40px;
    left:40px;
    right: 40px;
    bottom: 40px;
}

.loader_5{
     position: absolute;
     top:250px;
     left:85%;
     transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;
    perspective 600px;
    background: pink;
transform: rotateZ(75deg);
}

.loader_5 span{
    position: absolute;
    border: 10px solid lightblue;
    border-radius: 4px;
    left:0;
    top: 0;
}

.loader_5 span:before{
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 10px;
    height: 50%;
    background: yellow;
}

.loader_5 span:after{
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 10px;
    height: 50%;
    background: lightgreen;
}

.loader_5 span:nth-child(1){
    top:0;
    left:0;
    right: 0;
    bottom: 0;
    animation: animate 8s linear infinite;
}

.loader_5 span:nth-child(2){
    top:20px;
    left:20px;
    right: 20px;
    bottom: 20px;
    animation: animate 4s linear infinite;

}

.loader_5 span:nth-child(3){
    top:40px;
    left:40px;
    right: 40px;
    bottom: 40px;
}

@keyframes animate{
    0%{
        transform: rotateY(0deg);
    }
    100%{
        transform: rotateY(360deg);
    }
}
</style>

<div class="div_M">
<div class="loader_1">
<span></span>
<span></span>
<span></span>
</div>

<div class="loader_2">
<span></span>
<span></span>
<span></span>
</div>

<div class="loader_3">
<span></span>
<span></span>
<span></span>
</div>

<div class="loader_4">
<span></span>
<span></span>
<span></span>
</div>

<div class="loader_5">
<span></span>
<span></span>
<span></span>
</div>

<div class="div_L font_2">
<?php

// Compare the username and password with values stored in database.

//include the DB connect file
include "connectDB.php";

//prepare sql
$user = $_POST["usr"]; // username from login form
$pwd = $_POST["pwd"]; // password	from login form
$user_type = $_POST["user_type"];

//complete the sql

if ($user_type == "Admin") {
	$sql = "SELECT * FROM admin WHERE password = " . "'$pwd'" . "and username =" . "'$user'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
		echo "Welcome Administrator $user ! <br>";
		echo "Here you can add or delete a fruit and edit info of the fruit.<br>";
		echo "<a href = '03_Admin_index.php'>Admin them! </a><br>";
		echo "<a href = '10_view_image.php'>View and edit image</a>";
	} else {
		echo "Wrong user type or username or password.<br>";
		echo "<br><hr><br>Do not have an account? <a href='05_new_member_form.php'> Register </a>";
	}

	echo "<br><hr><br> Back to <a href='01_login.php'> Login Page </a>";

}
if ($user_type == "Buyer") {
	$sql = "SELECT * FROM buyer WHERE b_password = " . "'$pwd'" . "and b_name =" . "'$user'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
		echo "Welcome buyer $user ! <br>";
		echo "Here you can view and buy the fruit.<br>";
		echo "<a href = '04_Buyer_index.php'>View and buy them! </a><br>";
	} else {
		echo "Wrong user type or username or password.<br>";
		echo "<br><hr><br>Do not have an account? <a href='05_new_member_form.php'> Register </a>";
	}

	echo "<br><hr><br> Back to <a href='01_login.php'> Login Page </a>";
}
if ($user_type == "Seller") {
	$sql = "SELECT * FROM seller WHERE s_password = " . "'$pwd'" . "and s_name =" . "'$user'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
		echo "Welcome seller $user ! <br>";
		echo "Here you can view and sell the fruit.<br>";
		echo "<a href = '06_Seller_index.php'>View and sell them! </a><br>";
	} else {
		echo "Wrong user type or username or password.<br>";
		echo "<br><hr><br>Do not have an account? <a href='05_new_member_form.php'> Register </a>";
	}

	echo "<br><hr><br> Back to <a href='01_login.php'> Login Page </a>";
}
?>
</div>
</div>
</html>
