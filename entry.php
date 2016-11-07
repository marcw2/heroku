<?php 
	
	if(!empty($_POST)){
		if(!empty($_POST['email']) && !empty($_POST['passw'])){
			$email=$_POST['email'];
			$passw=$_POST['passw'];
			// comprovar BD
			$db=conecta($dbhost,$dbuser,$dbpass,$dbname);
			$sql="SELECT * FROM users WHERE email='$email' AND passw='$passw'";
			//echo $sql;
			//fer consulta
			if($res=mysqli_query($db,$sql)){
				//$registers=$res->fetch_array();
				$_SESSION['email']=$email;
				//var_dump($_SESSION);

				setcookie('email',$email,time()+1800,'/todo','');
				header('Location:list.php');
				exit();
				}
				//
			}
		 
	}
		
		
		 
	
?>
<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/entry.css">
	<title>TODO</title>
</head>
<body>
	<header>
		<div class="jumbotron text-center" >
  			<h1>TODO</h1>
  			<p>GEt your list, complete your tasks!</p>
  		</div>
	</header>
	<div class="container-fluid">
		<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
			<div class="formgroup">
			<label for"email">Email:</label>
			<input type="text" name="email" 
			value="<?= $_COOKIE['email'];?>" class="form-control">
			<label for="passw">Password</label><input type="password" name="passw" class="form-control">
			<input type="submit" value="Sign in">
			</div>
		</form>
	</div>
	
</body>
</html>