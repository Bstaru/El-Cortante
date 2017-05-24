<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{

	$IdUser = mysqli_real_escape_string($mysqli,$_POST['userNN']);
	$Titulo = mysqli_real_escape_string($mysqli,$_POST['titu']);
	$Seccion = mysqli_real_escape_string($mysqli,$_POST['section']);
	$Descrip = mysqli_real_escape_string($mysqli,$_POST['desc']);
	$Cuerpo = mysqli_real_escape_string($mysqli,$_POST['cue']);
	$Usuario = mysqli_real_escape_string($mysqli,$_POST['userNN']);

	//$error = '';
	
	$sql = "CALL i_noticia( '".$Titulo."', '".$Descrip."', '".$Cuerpo."', '".$Usuario."', '".$Seccion."');";

	echo($sql);

	$result=$mysqli->query($sql);

	header("location: ../index.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../new.php");
	}

	
$mysqli->close();	
	 

?>


