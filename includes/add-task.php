<?php
	//making variables to store posts, and the time and date of the posts
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');
	//connecting to database
	include('connect.php');
	//says where to save data
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	//says what to save
	$mysqli ->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");
	//displays the saved data
	$query = "SELECT * FROM tasks WHERE task = '$task' and date = 'date' and time = 'time'";
?>