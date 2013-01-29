<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="password"; // Mysql password
$db_name="bytebundle"; // Database name
$tbl_name="members"; // Table name

$myusername = $_SESSION['myusername'];
$mypassword = $_SESSION['mypassword'];

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result=mysql_query($sql);
$row = mysql_fetch_row($result);
$userid = $row[0];

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

			<!-- Heading Tag -->

<div id="heading">

<div class="logo">
	<h1>ByteBundle</h1><span><a href="#"><img class="imgLogo" src="img/logo.png"></a></span>
</div>

<?php 
				$temp = $_SESSION['myusername'];

                if ($temp = ""){

						print "<div class='loginAndReg'><a href='index.php' style='padding-right: 10px;'>Login</a> <a href='register.php>Register</a></div>";


					}

?>


</div>

			<!-- Einde Heading Tag -->

<div id="headingshadow"></div>

			<!-- Social Media Links (Twitter en Facebook Icons) -->

<div id="tooltipWrapper" style="display: none;">

<div id="socialTooltipFB">
</div>

<div id="socialTooltipTW">
</div>

</div>

<div id="social" style="display: none;">
<img class="facebook" src="img/icons/facebook.png">
<img class="twitter" src="img/icons/twitter.png">
</div>

			<!-- Einde Social Media Links -->

<div id="content-wrapper">

<div id="content">

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
		    <li><a href="viewbundle.php">My Bundle</a></li>
		</ul>

	<?php 
				$showName = $_SESSION['myusername'];

                if ($showName != ""){
                   print "<div class='loggedIn textSmall'>You are logged in as <span style='color: #b1cdd8;'>".$showName."</span></a>.";

                }
                
                else {
                    
                header("location:index.php");
                
                }

?>
		</div>

	</div>

	<!-- <div class="filler"></div> -->


<h1 class="fonted">New Snippet</h2> <br>

<div class="block-left">

	<form method="post" action="checksnippet.php">

<textarea style="width: 500px; height: 500px;" id="code" name="codebox">
</textarea>

    <script>

		var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		    lineNumbers: true,
		    gutter: true,
		    lineWrapping: true,
	        matchBrackets: true,
	        mode: "css",
	        indentUnit: 4,
	        indentWithTabs: true,
	        enterMode: "keep",
	        tabMode: "shift",
	        theme: "default"
		});

    </script>


</div>

<div id="formWrapper">

<div class="formText">


	Name: <br>
	<input type="text" class="inputName" title="Enter snippet name" name="snippet_name"><br>

	Bundle: <br>

	<input type="radio" name="bundleradio" value="existingbundle">

		<?php  

		$listItems = scandir("users/".$userid, 1);

			echo "<select class='inputBundle' title='Choose Bundle' name='bundle_name'>";

		foreach ($listItems as $key => $value) 

			if($value != "." && $value != ".." && $value != "addedlast.xml")
				{
				echo "<option value=".$value.">".$value."</option>";
				}

			echo "</select>";

		?>

		<option value="JavaScript">JavaScript</option>
		<option value="jQuery">jQuery</option>
		<option value="PHP">PHP</option>
		<option value="CSS">CSS</option>
	
	
	<input style="margin-left: 10px;" type="radio" name="bundleradio" value="newbundle"> 
	New Bundle: <input type="text" class="inputBundle2" title="Enter new bundle name" name="new_bundle_name"><br>
	
	Tags: <br>
	<input type="text" class="inputTags" title="Define tags for your snippet, divided by commas. (e.g. <i>webdesign, artwork, navigation, buttons, ...etc)</i>" name="snippet_tags"><br>

	Comments: <br>

	<textarea name="commentbox" class="commentBox" title="Insert any comments related to this snippet."></textarea>

	<input type="submit" class="submitButton" value="">
</form>

	</div>

</div>

</div>

</div>

</div>

<!-- <div id="footer">

<div class="footerText">
<ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">News</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">Login</a></li>
    <li><a href="#">Register</a></li>
</ul>
</div>

</div> -->

</body>
</html>