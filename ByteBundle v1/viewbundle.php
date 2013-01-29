<!DOCTYPE HTML>

<?php 

session_start();
include_once "mysql_connect.php";

$myusername = $_SESSION['myusername'];
$mypassword = $_SESSION['mypassword'];


$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result=mysql_query($sql);
$row = mysql_fetch_row($result);
$userid = $row[0];

$username = $_SESSION['myusername'];
// echo $username;

?>

<html>

<head>
	
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

	<input name="hiddenID" type="hidden" value="<?php echo $_SESSION['id'] ?>">

			<!-- Heading Tag -->

<div id="heading">

<div class="logo">
	<h1>ByteBundle</h1><span><a href="viewbundle.php"><img class="imgLogo" src="img/logo.png"></a></span>
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
			<li><a href="newsnippet.php">Create Snippet</a></li>
		    <li><a href="viewbundle.php">My Bundle</a></li>
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

</div>

	<!-- Einde LoggedIn Menu -->

</div>

	<!-- Einde Content Div -->

	<div class="filler"></div>

	<div id="bundleOverview_wrapper">

	<div id="bundleOverview">

		<a href="newbundle.php"><div class="bigBundle"></div></a>

		<h1 class="fonted white">Bundles:</h1>


		<?php  

		$listItems = scandir("users/".$userid, 1);
		// print_r($listItems);

			echo "<ul class='listOverview'>";

		foreach ($listItems as $key => $value) 

			if($value != "." && $value != ".." && $value != "addedlast.xml")
				{
				echo "<a href='bundlesummary.php?id=".$value."'><li name='".$value."'>".$value."</li></a>";
				}

			echo "</ul>";

		?>

	</div>

	</div>

	<div id="listBundleNames">



	</div>

	<h1 class="fonted floatLeft" style="margin-bottom: 20px;">Last added:</h1>

	<div id="currentBundle">

		


	</div>

</body>
</html>