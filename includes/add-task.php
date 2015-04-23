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
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$task_id = $row['id'];
			$task_name = $row['task'];
		}
	}
	$mysqli->close();
	echo '<li><span>' . $task_name . '</span><img id = "' . task_id . '" class = "delete-button" width = "10px" src = "images/close.svg" /></li>';
?>