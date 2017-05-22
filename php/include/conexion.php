<?php

function conectar(){ 
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "shineekey91";
	$name_db = "elcortante";
	 
	$conn = new mysqli($host_db, $user_db, $pass_db, $name_db)
         or die('Error');
	// Check connection
	if ($conn->error) {
	    die("Error de conexion: " . $conn->error);
	} 
	echo "Conectado!";
}


function deconectar($conn){
	$conn -> close ();
}


?>

