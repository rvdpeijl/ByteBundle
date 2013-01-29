<?php 

session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

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

$snipID = rand ( 10000,99999); 
$snippetname = $_POST['snippet_name'];
$snippetname = str_replace(" ","_",$snippetname);

// $newbundlename= $_POST['new_bundle_name'];

$selected = $_POST['bundleradio'];

if($selected == 'existingbundle'){ 
	$bundlename= $_POST['bundle_name'];
}

if($selected == 'newbundle'){ 
	$bundlename= $_POST['new_bundle_name'];
	$bundlename = str_replace(" ","_",$bundlename);
	mkdir("users/".$userid."/".$bundlename, 0700); 
}

$name = $_POST[name];
$pagelink = str_replace(" ","_",$name);

$sniptags= $_POST['snippet_tags'];
$comments = $_POST['commentbox'];
$code = $_POST['codebox'];

$snippetname = stripslashes($snippetname);
$sniptags = stripslashes($sniptags);
$comments = stripslashes($comments);

date_default_timezone_set('Europe/Amsterdam');
$dateadded = date('m/d/Y h:i:s a', time());

$list = $_POST['snippet_tags'];
$array = explode(',', $list); 

// Writing the XML 

$xml = "

<bundle>
	<snippet>
		<id>".$snipID."</id>
		<snippetname>".$snippetname."</snippetname>
		<bundlename>".$bundlename."</bundlename>
		<tags>".$sniptags."</tags>
		<comment>".$comments."</comment>
		<code>".$code."</code>
		<dateadded>".$dateadded."</dateadded>
	</snippet>
</bundle>";

$xmlAL = "

<bundle>
	<snippet>
		<id>".$snipID."</id>
		<snippetname>".$snippetname."</snippetname>
		<bundlename>".$bundlename."</bundlename>
		<tags>".$sniptags."</tags>
		<comment>".$comments."</comment>
		<code>".$code."</code>
		<dateadded>".$dateadded."</dateadded>
	</snippet>
</bundle>";

$xmlNEW = "

	<snippet>
		<id>".$snipID."</id>
		<snippetname>".$snippetname."</snippetname>
		<bundlename>".$bundlename."</bundlename>
		<tags>".$sniptags."</tags>
		<comment>".$comments."</comment>
		<code>".$code."</code>
		<dateadded>".$dateadded."</dateadded>
	</snippet> ";

$xmlNEWAL = "

	<snippet>
		<id>".$snipID."</id>
		<snippetname>".$snippetname."</snippetname>
		<bundlename>".$bundlename."</bundlename>
		<tags>".$sniptags."</tags>
		<comment>".$comments."</comment>
		<code>".$code."</code>
		<dateadded>".$dateadded."</dateadded>
	</snippet> ";

// End of writing XML


		$listItems = scandir("users/".$userid."/".$bundlename, 1);
		$xmlstring = $snippetname . ".xml";

				if (in_array ($xmlstring, $listItems)) { 

				   		echo "Snippet name already in use!"; 
				} 
				else { 
				   		$sxe = new SimpleXMLElement($xml);
						$sxeAL = new SimpleXMLElement($xmlAL);
						// $sxe->asXML("users/".$userid."/".$bundlename.".xml");

						$dom = new DOMDocument('1.0');
						$dom->preserveWhiteSpace = false;
						$dom->formatOutput = true;
						$dom->loadXML($sxe->asXML());
						$dom->save("users/".$userid."/".$bundlename."/".$snippetname.".xml");

						$domAL = new DOMDocument('1.0');
						$domAL->preserveWhiteSpace = false;
						$domAL->formatOutput = true;
						$domAL->loadXML($sxeAL->asXML());
						$domAL->save("users/".$userid."/addedlast.xml");

						header("location:snippet_success.php"); 
				}



?>