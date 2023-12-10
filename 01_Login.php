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

img{
    height: 230px;
    width: 400px;
}

h1{
    font-size: 60px;
    position:absolute;
    top: 20px;
    left: 43%;
    color: white;
    -webkit-text-stroke: 0.2vw black;
}

h1::before{
    content: attr(data-text);
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0;
    height: 100%;
    color: red;
    -webkit-text-stroke: 0vw red;
    overflow: hidden;
    animation: animate 6s linear infinite;
}
@keyframes animate {
    0%,10%,100%
    {
        width: 0;
    }
    70%,90%
    {
        width: 100%;
    }
}

.One{
    font-size: 60px;
    position:absolute;
    top: 600px;
    left: 20%;
    color: white;
    -webkit-text-stroke: 0.2vw black;
}

.One::before{
    content: attr(data-text);
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0;
    height: 100%;
    color: red;
    -webkit-text-stroke: 0vw red;
    overflow: hidden;
    animation: one 9s linear infinite;
    animation-delay: 1s;
}

@keyframes one {
    0%,10%
    {
        width: 0;
    }
    30%,100%
    {
        width: 100%;
    }
}

.Two{
    font-size: 60px;
    position:absolute;
    top: 600px;
    left: 38%;
    color: white;
    -webkit-text-stroke: 0.2vw black;
}

.Two::before{
    content: attr(data-text);
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0;
    height: 100%;
    color: pink;
    -webkit-text-stroke: 0vw red;
    overflow: hidden;
    animation: two 9s linear infinite;
    animation-delay: 1s;
}

@keyframes two {
    0%,10%
    {
        width: 0;
    }
    30%,100%
    {
        width: 100%;
    }
}

.Three{
    font-size: 60px;
    position:absolute;
    top: 600px;
    left: 45%;
    color: white;
    -webkit-text-stroke: 0.2vw black;
}

.Three::before{
    content: attr(data-text);
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0;
    height: 100%;
    color: lightblue;
    -webkit-text-stroke: 0vw red;
    overflow: hidden;
    animation: three 9s linear infinite;
    animation-delay: 1s;
}

@keyframes three {
    0%,10%
    {
        width: 0;
    }
    30%,100%
    {
        width: 100%;
    }
}

.Four{
    font-size: 60px;
    position:absolute;
    top: 600px;
    left: 65%;
    color: white;
    -webkit-text-stroke: 0.2vw black;
}

.Four::before{
    content: attr(data-text);
    position: absolute;
    top: 0px;
    left: 0px;
    width: 0;
    height: 100%;
    color: orange;
    -webkit-text-stroke: 0vw red;
    overflow: hidden;
    animation: four 9s linear infinite;
    animation-delay: 1s;
}

@keyframes four {
    0%,10%
    {
        width: 0;
    }
    30%,100%
    {
        width: 100%;
    }
}

.center{
    position: absolute;
    top:140px;
    left:70%;
    transform: translate(-50%,-50%);
}
.center img{
    position: absolute;
    width:200px;
    height:200px;
    border: 3px solid black;
    background: black;
    animation: center 4s infinite ease-in-out;
}
.center img:nth-child(1){
    background: pink;
    left:0px;
    top: 0px;
    animation-delay: .2s
}
.center img:nth-child(2){
    background: pink;
    left:0px;
    top: 210px;
    animation-delay: .4s
}
.center img:nth-child(3){
    background: pink;
    left:210px;
    top: 0px;
    animation-delay: .6s
}
.center img:nth-child(4){
    background: pink;
    left:210px;
    top:210px;
    animation-delay: .8s
}
@keyframes center{
    0%{
        transform: rotateY(0deg)
    }
    20%{
        transform: rotateY(360deg)
    }
    40%{
        transform: rotateX(180deg)
    }
    60%{
        transform: rotateX(0deg)
    }
    80%{
        transform: rotateX(360deg)
    }
    100%{
        transform: rotateY(180deg)
    }
}
.box{
    position: absolute;
    top:140px;
    left:5%;
    transform: translate(-50%,-50%);
}
.box img{
    position: absolute;
    width:200px;
    height:200px;
    border: 3px solid black;
    background: black;
    animation: center 4s infinite ease-in-out;
}
.box img:nth-child(1){
    background: pink;
    left:0px;
    top: 0px;
    animation-delay: .2s
}
.box img:nth-child(2){
    background: pink;
    left:0px;
    top: 205px;
    animation-delay: .4s
}
.box img:nth-child(3){
    background: pink;
    left:205px;
    top: 0px;
    animation-delay: .6s
}
.box img:nth-child(4){
    background: pink;
    left:205px;
    top:205px;
    animation-delay: .8s
}
@keyframes box{
    0%{
        transform: rotateY(0deg)
    }
    20%{
        transform: rotateY(360deg)
    }
    40%{
        transform: rotateX(180deg)
    }
    60%{
        transform: rotateX(0deg)
    }
    80%{
        transform: rotateX(360deg)
    }
    100%{
        transform: rotateY(180deg)
    }
}

</style>







<body>
  <div class="div_M">
<h1 data-text="Welcome">Welcome</h1>
<p class="One" data-text="Welcome">Welcome</p>
<p class="Two" data-text="To">To</p>
<p class="Three" data-text="Group14's">Group14's</p>
<p class="Four" data-text="FruitShop">FruitShop</p>

<div class="center">
<img src="grape.jpg">
<img src="cherry.jpg">
<img src="durian.jpg">
<img src="pineapple.jpg">
</div>

<div class="box">
<img src="banana_picture.jpg">
<img src="Background_1.jpg">
<img src="Background_2.jpg">
<img src="durian.jpg">
</div>

<br><br>
<div class="div_L">
<br>
  <h2>Login Page</h2>

  <form action="02_checkPasswordByDB.php" method="POST">
    <input type="text" class="input_1" id="usr" name="usr" placeholder="User Name"><br><br>
    <input type="password" class="input_1" id="pwd" name="pwd" placeholder="****"><br><br><br>
    <select name="user_type" class="select">
      <option value="Admin">Admin</option>
      <option value="Buyer">Buyer</option>
      <option value="Seller">Seller</option>
    </select>
    &nbsp &nbsp
    <input type="submit" class="input_2" value="Login">
  </form>
<br>
  <p class="font_1">Do not have an account? <a href="05_new_member_form.php"> <br>Register </a> </p>
</div>
</div>
</body>

</html>
