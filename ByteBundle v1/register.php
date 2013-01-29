<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

?>

<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="tipTip.css">

	<script src="Scripts/js/jqueryLib.js"></script>
	<script src="Scripts/js/functions.js"></script>
	<script src="Scripts/js/jquery.tipTip.js"></script>
	<script src="Scripts/js/jquery.tipTip.minified.js"></script>

	<meta charset="utf-8">
    <title>ByteBundle</title>

    		<!-- Links en Scripts van CodeMirror -->

    <link rel="stylesheet" href="Scripts/CodeMirror/lib/codemirror.css">
    <link rel="stylesheet" href="Scripts/CodeMirror/theme/solarized.css">
    <script src="Scripts/CodeMirror/lib/codemirror.js"></script>
    <script src="Scripts/CodeMirror/lib/util/matchbrackets.js"></script>
    <script src="Scripts/CodeMirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="Scripts/CodeMirror/mode/xml/xml.js"></script>
    <script src="Scripts/CodeMirror/mode/javascript/javascript.js"></script>
    <script src="Scripts/CodeMirror/mode/css/css.js"></script>
    <script src="Scripts/CodeMirror/mode/clike/clike.js"></script>
    <script src="Scripts/CodeMirror/mode/php/php.js"></script>
    <link rel="stylesheet" href="Scripts/CodeMirror/mode/doc/docs.css">

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

    <h1 class="fonted">Registration</h2>

        <div id="registerDiv">

            <form name="register" method="post" action="checkregistration.php">
              Username:<br>
              <input id="myusername" class="name" type="text" style="width: 200px;" name="myusername"><br>
              Password:<br>
              <input id="mypassword" type="password" style="width: 200px;;" name="mypassword"><br>
              Repeat password:<br>
              <input id="repeatpass" type="password" style="width: 200px;;" name="repeatpass"><br>

            <input type="submit" class="registerButton" value="">

            </form>

        </div>

</div>


</div>

</div>


</body>
</html>