<?php
	 $host_db = "localhost";
	 $user_db = "root";
	 $pass_db = "shineekey91";
	 $db_name = "elcortante";
	 
	 $mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
     $mysqli->set_charset("utf8");

		if ($mysqli->error) {
	    	die("Error de conexion: " . $mysqli->error);
		} 
		//echo "Conectado!";
	

?>

