<?php

include "connectDB.php";

$user = $_POST["usr"];
$pwd1 = $_POST["pwd1"];
$pwd2 = $_POST["pwd2"];
$user_type = $_POST["user_type"];

if ($pwd1 != $pwd2) {
  echo '<script>alert("The password and confirm password do not match !!")</script>';
  echo "<br><hr><br> Go back to   <a href='05_new_member_form.php'> New Member Form </a>";
} else {
  if ($user) {

    if ($user_type == "Buyer") {
      $result1 = $conn->query($sql1 = "SELECT * FROM buyer WHERE b_name = '$user'");
      if ($result1->num_rows > 0) {
        echo "Oops, $user already exists!";
        echo "<br><hr><br> Go back to   <a href='05_new_member_form.php'> New Member Form </a>";
      } else {
        $sql = "INSERT INTO `buyer` (`bid`, `b_name`, `b_password`) VALUES (NULL, '$user', '$pwd1')";
        $result = mysqli_query($conn, $sql);
        // echo $result;
        if ($result > 0) {
          //FIXME: echo success or failure message.
          echo "<b>$user</b>" . " is successfully registered!";
          echo "<br><hr><br> Go back to   <a href='01_Login.php'> Login Page </a>";
        }
      }

    } else {
      $result1 = $conn->query($sql1 = "SELECT * FROM seller WHERE s_name = '$user'");
      if ($result1->num_rows > 0) {
        echo "Oops, $user already exists!";
        echo "<br><hr><br> Go back to   <a href='05_new_member_form.php'> New Member Form </a>";
      } else {
        $sql = "INSERT INTO `seller` (`sid`, `s_name`, `s_password`) VALUES (NULL, '$user', '$pwd1')";
        $result = mysqli_query($conn, $sql);
        // echo $result;
        if ($result > 0) {
          //FIXME: echo success or failure message.
          echo "<b>$user</b>" . " is successfully registered!";
          echo "<br><hr><br> Go back to   <a href='01_Login.php'> Login Page </a>";
        }
      }
    }

  } else {
    echo "user is null!";
  }
}

?>