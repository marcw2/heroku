<?php
//Connection DataBase
//first takes the doamin name

$domain=$_SERVER['HTTP_HOST'];
	if($domain=="toni.cesnuria.com"){
		$conf='config.ini';
	}else{
		$conf='config.dev.ini';
	}
//picks the config file	
$config = parse_ini_file($conf);
//connect to DB
$conn = new mysqli($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}