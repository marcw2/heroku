<?php
	
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
					if (isset($_SESSION['email'])){
						echo $_SESSION['email'];
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