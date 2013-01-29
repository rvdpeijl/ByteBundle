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

$clicked = $_GET["name"];
$bundle = $_GET["bundle"];

unlink("users/".$userid."/".$bundle."/".$clicked.".xml");

header("location:delete_success.php"); 


?>