<?php
$serverNAME = "localhost:3307";
$userNAME = "root";
$password = "";
$db = "rosebud";
$conn = mysqli_connect($serverNAME, $userNAME, $password, $db);

if(isset($_POST['username'])){
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select * from login where username='$username' and password='$password' limit 1";
$result=mysql_query($sql);
if(mysql_num_rows($result)==1){
echo"You have successfully logged in";
exit();
}
else
{
echo"you have entered incorrect password";
}
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
      a{
        color: skyblue;
      }
    </style>
    <link rel="stylesheet" href="newlogin.css">
    <title>newlogin</title>
  </head>
  <body>
<div class="dbox">
  <h2>Successful password reset!</h2>
  <h3>You can now use your new password to login.</h3>
</div>
<br>
<form action="file:///C:/Users/91959/Downloads/demo/main.html" method="post">

<br>
<form method="POST" action="#">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container">
  <a href="file:///C:/Users/91959/Downloads/demo/newlogin.html">  <button type="button" class="cancelbtn">Cancel</button></a>
    <span class="psw">Forgot <a href="file:///C:/Users/91959/Downloads/demo/forgotpswd.html">password?</a></span>
  </div>
</form>
<br>
<div class="back">
<a href="file:///C:/Users/91959/Downloads/demo/home.html"> <button type="button" class="homebtn">Home</button></a>
</div>

  </body>
</html>
