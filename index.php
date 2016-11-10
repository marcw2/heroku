<?php
	session_start();
	
	ini_set('display_errors','1');
	if (isset($_SESSION)){
		unset($_SESSION);
	}
	
	include 'entry.php';