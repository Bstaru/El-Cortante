<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$busqueda = mysqli_real_escape_string($mysqli,$_POST['buscarAlgo']);


	header("location: ../buscar.php?bus=".$busqueda);
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../index.php");
	}

	
$mysqli->close();	
	 

?>


