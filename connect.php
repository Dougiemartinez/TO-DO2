<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
//mysqli->connect_error then we want it to die and have this message
if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno .')'
		. $mysqli->connect-error);
}
else {
	echo "Connection made";
}
$mysqli->close();
?>