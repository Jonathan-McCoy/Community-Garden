<?php
function dbConnect(){
	$host = "localhost"; // for the omega server, "localhost" is the host name.  Do not edit.
	$user = "jxm3026"; // edit it with your own user name.
	$pwd = "iY0n2TazG"; // edit it with your own database password
	$database = "jxm3026"; // edit with your database name, which is your user name in the omega server
 
	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database) or die("could not connect to server");

	// return $conn to the fucntion call
	return $conn;}
?>