<?php
	
		function conecta($host,$usr,$pw,$db){
			try {
      			$mysqli = new mysqli($host,$usr,$pw,$db);
      			$connected = true;
      			return $mysqli;
   			} catch (mysqli_sql_exception $e) {
      			throw $e;
   			} 
		}