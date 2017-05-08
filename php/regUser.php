<?php
include('conection.php');
session_start();

if(!empty($_POST))
{
	$Name = mysqli_real_escape_string($conexion,$_POST['name']);
	$Last1 = mysqli_real_escape_string($conexion,$_POST['1lastname']);
	$Last2 = mysqli_real_escape_string($conexion,$_POST['2lastname']);
	$Tel = mysqli_real_escape_string($conexion,$_POST['tel']);
	$Type = mysqli_real_escape_string($conexion,$_POST['type']);
	$Bday = mysqli_real_escape_string($conexion,$_POST['birthD']);
	$Mail = mysqli_real_escape_string($conexion,$_POST['email']);
	$Pass = mysqli_real_escape_string($conexion,$_POST['contraa']);

	$error = '';
	
	$sql = "CALL i_usuario( '".$Pass."', '".$Name."', '".$Last1."', '".$Last2."', '".$Mail."', '".$Tel."', '".$Bday."', '".$Type."', 'null');";

	echo($sql);

	$result=$conexion->query($sql);

	header("location: ../index.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../new.php");
	}

	
	 
?>