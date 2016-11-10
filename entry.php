<?php 
   require 'lib/bd.php';
	
	if(!empty($_POST)){
		if(!empty($_POST['email']) && !empty($_POST['passw'])){
			
			$email = db_quote($_POST['email']);
			$passw=db_quote($_POST['passw']);
			
			// comprovar BD
			$con=db_connect();
			$sql="SELECT * FROM users WHERE email=".$email." AND passw=".$passw"";
			echo $sql;
			//fer consulta
			$result=db_select($sql);
			var_dump($result);
			die;
			if($result){
				//$registers=$res->fetch_array();
				$_SESSION['email']=$email;
				setcookie('email',$email,time()+1800,'/todo','');
				header('Location:list.php');
				exit();
				}
				else{
					
					header('Location:.');
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
	<nav class="navbar navbar-default">
		<ul class="nav navbar-nav">
			<li class="active"><a href="register.php">Sign up</a></li>
		</ul>
	</nav>
		<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
			<div class="formgroup">
			<label for"email">Email:</label>
			<input type="text" name="email" 
			value="<?php
				if (isset($_COOKIE['email'])){
					echo $_COOKIE['email'];
				}
			 ?>" class="form-control">
			<label for="passw">Password</label><input type="password" name="passw" class="form-control">
			<input type="submit" value="Sign in">
			</div>
		</form>
	</div>
	
</body>
</html>