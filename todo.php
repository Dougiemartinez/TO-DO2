<!DOCTYPE html>
<html
</div>>
	<head>
		<title>Todo-List</title>
		<!-- links main css file -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/js" href="js/main.js">
	</head>
	<body>
		<div class="wrap"></div>
		<div class="task-list">
			<ul>
				<?php
					// inserts connect.php file into this div
					require("includes/connect.php"); 
					//creates variables
					$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
					//slects information from table and orders it from newest to latest
					$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
					if ($result = $mysqli->query($query)) {
						$numrows = $result->num_rows;
						//runs if there is at least one row
						if ($numrows > 0) {
							//runs while there is a row
							while ($row = $result->fetch_assoc()) {
								//gets the row's name
								$task_id = $row['id'];
								//gets the row's data
								$task_name = $row["task"];
								//echoes out the name and data
								echo '<li>
								<span>'. $task_name . '</span>
								<img id = "' . $task_id . '" class = "delete-button" width = "10px" src = "images/close.svg"/>
								</li>';
							}
						}
					}
				?>
			</ul>
		</div>
		<!-- inserts a box for inserting text -->
		<form class="add-new-task" autocomplete = "off">
			<input type="text" name="new-task" placeholder="Add new item..."/> 
		</form>
		<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"></div>
    <div class="item"></div>
    <div class="item"></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
	</body>
	<scripts src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		//calls add_task function 
		add_task();
		//creates add_task function
		function add_task(){
			$('.add-new-task').submit(function(){
				var new_task = $('.add-new-task input[name=new-task]').val();
				if (new_task != '') {
					//goes to add-task.php
					$.post('includes/add-tasks.php', {task: new_task}, function(data){
						$('add-new-task input[name=new-task]').val();
						$(data).appendTo('.task-list ul').hide().fadeIn();
					});
				}
				return false;
			});
		}
		$('.delete-button').click(function(){
			var current_element = $(this);
			var task_id = $(this).attr('id');
			//calls delete-task.php
			$.post('includes/delete-task.php' , {id: task_id}, function(){
				//calls variables
				current_element.parent().fadeOut("fast", function(){
					$(this).remove();
				});
			});
		});
	</script>
</html>