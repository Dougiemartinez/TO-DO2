<!DOCTYPE html>
<html>
	<head>
		<title>Douglas To-DoList</title>
		<!-- links main css file -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class="wrap"></div>
		<div class="task-list">
			<ul>
				<!-- inserts connect.php file into this div -->
				<?php require("includes/connect.php"); ?>
			</ul>
		</div>
		<!-- inserts a box for inserting text -->
		<form class="add-new-task" autocomplete = "off">
			<input type="text" name="new-task" placeholder="Add new item..."/> 
		</form>
	</body>
	<scripts src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		//calls add_task function 
		add_task();
		//creates add_task function
		function add_task(){
			$('.add-new-task').submit(function(){
				var new_task = $('.add-new-task input[name=new-task').val();
				if (new_task != '') {
					$.post('includes/add-task.php', { task: new_task}, function(data){
						$(('add-new-task input[name=new-task]').val();
							$(data).appendTo('task-list ul').hide().fadeIn();
						)
					});
				}
				return false;
			});
		}
	</script>
</html>
</html>