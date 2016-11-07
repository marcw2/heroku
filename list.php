<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/entry.css">
	<title>Tasks</title>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
			<h1>
				<?php
					if (!empty($_COOKIE['email'])){
						echo $_COOKIE['email'];
					}
				?>
			</h1>
		</div>
		<table></table>
	</div>
	<footer>
		<a href="exit.php">Logout</a>
	</footer>
</body>
</html>