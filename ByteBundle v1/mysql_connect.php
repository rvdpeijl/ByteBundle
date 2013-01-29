<?

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="password"; // Mysql password
$db_name="bytebundle"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>