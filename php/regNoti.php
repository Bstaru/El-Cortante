<?php
include('conection.php');
session_start();

if(!empty($_POST))
{
	$IdUser = mysqli_real_escape_string($conexion,$_POST['userNN']);
	$Titulo = mysqli_real_escape_string($conexion,$_POST['titu']);
	$Seccion = mysqli_real_escape_string($conexion,$_POST['section']);
	$Descrip = mysqli_real_escape_string($conexion,$_POST['desc']);
	$Cuerpo = mysqli_real_escape_string($conexion,$_POST['cue']);
	$Usuario = mysqli_real_escape_string($conexion,$_POST['userNN']);

	$error = '';
	
	$sql = "CALL i_noticia( '".$Titulo."', '".$Descrip."', '".$Cuerpo."', '".$Usuario."', '".$Seccion."');";

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