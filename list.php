<?php
	session_start();
	include 'lib/con.php';
	//preparing statement
	$stmt=$conn->prepare("SELECT  `tasks`.`id`,`tasks`.`desc`, `tasks`.`dates`, `tasks`.`completed`
	 FROM `users` LEFT JOIN `tasks` ON `tasks`.`user` = `users`.`id` WHERE `users`.`email`=? ");
	$stmt->bind_param('s',$_SESSION['email']);
	$stmt->execute();
	$stmt->bind_result($id,$desc,$dates,$completed);	

?>
<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/entry.css">
	<title>Tasks</title>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
			<h2>TASKS - User:
				<?php
					if (isset($_SESSION['email'])){
						echo $_SESSION['email'];
					}
				?>
			</h2>
		</div>
		<nav class="navbar navbar-default">
		<ul class="nav navbar-nav">
			<li class="active"><a href="add.php">Add Task</a></li>
			<li class="active"><a href="exit.php">Logout</a></li>
		</ul>
	</nav>
		
		<table class="table table-striped">
		<thead>
		      <tr>
		        <th>Task</th>
		        <th>Date</th>
		        <th>Complete?</th>
		        <th>Finish</th>
		        <th>Delete</th>
		      </tr>
		</thead>
			<?php 
				while($stmt->fetch()){
					$timestamp=strtotime($dates);
					echo '<tr>';
					echo '<td>'.($completed==0?'':'<del>').$desc.($completed==0?'':'</del>').'</td>';
					echo '<td>'.date("d-m-Y H:i:s", $timestamp).'</td>';
					echo '<td>'.($completed==0?'No':'Si').'</td>';
					echo '<td><button type="button" class="btn btn-info"><a href="complete.php?task='.$id.'">'.Complete.'</a></button></td>';
					echo '<td><button type="button" class="btn btn-default btn-sm"><a href="del.php?task='.$id.'">Del</a></button></td>';
					
					echo '</tr>';
				}
			?>
				
			
		</table>
	</div>
	<footer>
		<h6 align="center">&copy; Toni- 2016</h6>
	</footer>
</body>
</html>