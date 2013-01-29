<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="password"; // Mysql password
$db_name="bytebundle"; // Database name
$tbl_name="members"; // Table name

// username and password sent from form
$newusername=$_POST['myusername'];
$newpassword=$_POST['mypassword'];
$repeatpass=$_POST['repeatpass'];

if($newusername == "")
		{
			die("Oops! You didn't enter a username!");
		}

	if($newpassword == "" || $repeatpass == "")
		{
			die("Oops! You didn't fill out one of the password boxes!");
		}

	if($newpassword != $repeatpass)
		{
			die("Ouch! Your passwords don't match! Try again.");
		}

// To protect MySQL injection (more detail about MySQL injection)
$newusername = stripslashes($newusername);
$newpassword = stripslashes($newpassword);
$repeatpass = stripslashes($repeatpass);

// $newusername = mysql_real_escape_string($newusername);
// $newpassword = mysql_real_escape_string($newpassword);
// $repeatpass = mysql_real_escape_string($repeatpass);

// SQL Query String

$newUserID = rand ( 1000,9999);

$sql="INSERT INTO members (id, username, password) VALUES ('$newUserID','$newusername','$newpassword')"; 

// Connect to server and select databse.

$con = mysql_connect("$host","$username","$password");
mysql_select_db("$db_name", $con);

if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
}

if (!mysql_query($sql,$con))
  {
  	die('Error: ' . mysql_error());
} 

		if(!file_exists($newUserID) OR !is_dir($newUserID)){
	        mkdir("users/".$newUserID, 0700); 

						$dom = new DOMDocument('1.0');
						$dom->preserveWhiteSpace = false;
						$dom->formatOutput = true;
						$dom->save("users/".$newUserID."/addedlast.xml");

	        header("location:registration_success.php");     
	} 
	else {
		die('Something went wrong... Please try again.');
	}
	
?>