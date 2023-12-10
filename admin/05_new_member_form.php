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
        height: 450px;
        background-color: lightgrey;
        position: absolute;
        left: 37%;
        top: 140px;
    }

img{
    height: 200px;
    width: 250px;
}

.continer {
    height :200px;
    width: 100%;
    overflow: hidden;
    border: 1px solid black;
    background-color: red;
    position: absolute;
    top: 680px;
}

.child{
    display: flex;
    height: 200px;
    width: 100%;
    animation: video 16s infinite;
    animation-direction:alternate;
}

@keyframes video {
    0%{
        transform: translateX(0);
    }
    25%{
        transform: translateX(-400px);
    }
    50%{
        transform: translateX(-800px);
    }
    75%{
        transform: translateX(-1200px);
    }
    100%{
        transform: translateX(-1600px);
    }
    }
    

</style>


<body>
<div class="div_M">

<div class="continer">
<div class="child">
<img src="Red_Apple.jpg">
<img src="banana_picture.jpg">
<img src="cherry.jpg">
<img src="durian.jpg">
<img src="grape.jpg">
<img src="pineapple.jpg">
<img src="mango.jpeg">
<img src="mangosteen.jpg">
<img src="mulberry.jpeg">
<img src="orange.jpeg">
<img src="papaya.jpeg">
<img src="peach.jpeg">
<img src="pear.jpg">
<img src="lyche.jpeg">
<img src="strawberry.jpg">
<img src="tomato.jpg">
<img src="watermelon.jpeg">

</div>
</div>

<div class="div_L">
  <h2>New Member Form</h2>
  <p>Note that the username is unique and the minimum length of password is 6.</p>
  <form action="05_new_member.php" method="POST">
    <label for="usr" class="font_1">username:</label><br>
    <input type="text" class="input_1" id="usr" name="usr" placeholder="New memeber name" required><br><br>
    <label for="pwd" class="font_1">password:</label><br>
    <input type="password" class="input_1" id="pwd1" name="pwd1" placeholder="******" minlength = "6" required><br><br>
    <label for="pwd" class="font_1">confirm password:</label><br>
    <input type="password" class="input_1" id="pwd2" name="pwd2" placeholder="******" minlength = "6" required><br><br>
    <select name="user_type">
      <option value="Buyer">Buyer</option>
      <option value="Seller">Seller</option>
    </select>
    <input type="submit" value="Register">
  </form>
  <p>Already have a account? <a href="01_Login.php"> Login </a> </p>
</div>
</div>
</body>

</html>
