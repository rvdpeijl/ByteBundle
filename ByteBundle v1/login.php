<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

?>

<html>

<head>

    <script type="text/javascript" src="Scripts/js/sha512.js"></script>
    <script type="text/javascript" src="Scripts/js/forms.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="tipTip.css">

    <script src="Scripts/js/jqueryLib.js"></script>
    <script src="Scripts/js/functions.js"></script>
    <script src="Scripts/js/jQueryXML.js"></script>
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

</head>

<body>

<div id="heading">

<div class="logo">
	<h1>ByteBundle</h1><span><a href="#"><img class="imgLogo" src="img/logo.png"></a></span>
</div>

<?php 
                $showName = $_SESSION['myusername'];

                if ($showName != ""){ ?>

<div id="navWrapper">

    <div id="optionsWrapper" title="Settings">  
    </div>

    <div id="optionsBar">
        <ul class="settingsText">
            <li><a href="#">Control Panel</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <div class="navLoggedIn">

        <ul class="automarge navText">
            <li><a href="#">Create Snippet</a></li>
            <li><a href="#">My Bundle</a></li>
        </ul>

    <?php 
                $showName = $_SESSION['myusername'];

                if ($showName != ""){
                   print "<div class='loggedIn textSmall'>You are logged in as <a href='#''>".$showName."</a>.";

                }
                
                else {
                    
                header("location:index.php");
                
                }

?>
        </div>

    </div>

<? } ?>


</div>

<div id="headingshadow"></div>

<div id="content-wrapper">

<div id="content">

    <div id="loginBox">

            <form name="loginForm" method="post" action="checklogin.php">
                Username: <br>
                <input name="myusername" type="text" id="myusername"><br>
                Password: <br>
                <input name="mypassword" type="text" id="mypassword"><br>
                <input class="loginButton" type="submit" name="Submit" value="">
            </form>

    </div>

</div>

</div>

</body>
</html>