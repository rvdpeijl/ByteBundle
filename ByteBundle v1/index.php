<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div id="heading">

<div class="logo">
	<h1>ByteBundle</h1><span><a href="#"><img class="imgLogo" src="img/logo.png"></a></span>
</div>

<div class="loginAndReg">
    <a href="index.php" style="padding-right: 10px;">Login</a> <a href="register.php">Register</a>
</div>


</div>

<div id="headingshadow"></div>


<div id="content-wrapper">

<div id="content">

<div id="loginBox">

<div id="txtLogin">

    <form name="loginForm" method="post" action="checklogin.php">
      Username:<br>
      <input name="myusername" class="name" type="text" style="width: 200px;" name="myusername"><br>
      Password:<br>
      <input name="mypassword" type="password" style="width: 200px;;" name="mypassword"><br>
    <!---<input type="submit" value="Submit">-->




</div>

<input type="submit" class="loginButton" value="">

</form>

</div>

<div id="middle">
<h1 class="fonted">Introducing ByteBundle</h1> <br>

<div class="baseFont">

ByteBundle is a platform for programmers on which they can organize little snippets of code effortlessly.

<div class="learnMore"></div>

</div>


</div>



</div>


</div>

</div>


</body>
</html>