<!DOCTYPE html>
<html>
	<head>
		<title>Todo-List</title>
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
				var new_task = $('.add-new-task input[name=new-task]').val();
				if (new_task != '') {
					//goes to add-task.php
					$.post('includes/add-task.php', {task: new_task}, function(data){
						$('add-new-task input[name=new-task]').val();
						$(data).appendTo('task-list ul').hide().fadeIn();
					});
				}
				return false;
			});
		}
		$('.delete-button').click(function(){
			var current_element = $(this);
			var task_id = $(this).attr('id');
			//calls delete-task.php
			$.post('includes/delete-task.php'. {id: task_id}, function(){
				//calls variables
				current_element.parent().fadeOut("fast", function(){
					$(this).remove();
				});
			});
		});
	</script>
</html>