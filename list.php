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
			<h2>User:
				<?php
					if (isset($_SESSION['email'])){
						echo $_SESSION['email'];
					}
				?>
			</h2>
		</div>
		
		<table class="table table-striped">
		<thead>
		      <tr>
		        <th>Tasca</th>
		        <th>Data</th>
		        <th>Completada?</th>
		      </tr>
		</thead>
			<?php 
				while($stmt->fetch()){
					$timestamp=strtotime($dates);
					echo '<tr>';
					echo '<td>'.($completed==0?'':'<del>').$desc.($completed==0?'':'</del>').'</td>';
					echo '<td>'.date("d-m-Y H:i:s", $timestamp).'</td>';
					echo '<td>'.($completed==0?'No':'Si').'</td>';
					echo '<td><a href="complete.php?task='.$id.'">'.Complete.'</a></td>';
					
					echo '</tr>';
				}
			?>
				
			
		</table>
	</div>
	<footer>
		<h4><a href="add.php">Add Task</a></h4>
		<h4><a href="exit.php">Logout</a></h4>
	</footer>
</body>
</html>