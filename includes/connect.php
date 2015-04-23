<?php
//connects code to localhost/phpmyadmin
$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
//if $mysqli dosent work, then it dies and gives a message
if ($mysqli->connect_error){
	die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}
else{
	//echo "Connection Made";
}
	$mysqli->close();
?>