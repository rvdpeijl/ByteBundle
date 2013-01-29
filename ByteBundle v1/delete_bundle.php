<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

$bundle = $_GET["bundle"];

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
                $temp = $_SESSION['myusername'];

                if ($temp = ""){

                        print "<div class='loginAndReg'><a href='#' style='padding-right: 10px;'>Login</a> <a href='#'>Register</a></div>";

                    }

?>


</div>

<div id="headingshadow"></div>

<div id="content-wrapper">

<div id="content">

    <h2 class="fonted">You are about to delete a bundle... </h2><br>

    <p class="fonted">Are you sure you want to delete the bundle "<? echo $bundle; ?>" and all of its components?</p><br>

    <p class="fonted dark"><a href="delete_bundle_process.php?bundle=<? echo $bundle?>">YES! Delete this bastard.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:javascript:history.go(-1)">NO! Get me outta here!</a></p>

</div>

</div>

</body>
</html>