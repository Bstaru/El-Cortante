<?php
include('conection.php');
session_start();

if(!empty($_POST))
{
	$idU = $_SESSION["IdUserReg"];

	$Name = mysqli_real_escape_string($conexion,$_POST['nameE']);
	$Last1 = mysqli_real_escape_string($conexion,$_POST['1lastnameE']);
	$Last2 = mysqli_real_escape_string($conexion,$_POST['2lastnameE']);
	$Tel = mysqli_real_escape_string($conexion,$_POST['telE']);
	$Type = mysqli_real_escape_string($conexion,$_POST['typeE']);
	$Bday = mysqli_real_escape_string($conexion,$_POST['birthDE']);
	$Mail = mysqli_real_escape_string($conexion,$_POST['emailE']);
	$Pass = mysqli_real_escape_string($conexion,$_POST['contraaE']);

	$error = '';
	
	$sql = "CALL u_usuario( '".$idU."','".$Pass."', '".$Name."', '".$Last1."', '".$Last2."', '".$Mail."', '".$Tel."', '".$Bday."', '".$Type."', 1, 'null');";

	//echo($sql);

	$result=$conexion->query($sql);

	header("location: ../profile.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../editU.php");
	}

	
	 
?>