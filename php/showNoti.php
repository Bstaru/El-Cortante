<?php
require('conection.php');
session_start();


if(!empty($_POST))
{
	
	$error = '';
	
	$sql = "CALL s_usuario_login('".$Password."','".$Correo."'); ";
	echo($sql);

	$result=$conexion->query($sql);

	$rows = $result->num_rows;
	
        
	if($rows > 0){
		$row = $result->fetch_assoc();

		$_SESSION['IdUserReg'] = $row['idUsuario'];
		$_SESSION['NombreUserR'] = $row['nombreU'];
		$_SESSION['APU'] = $row['AP'];
		$_SESSION['AMU'] = $row['AM'];
		$_SESSION['telU'] = $row['tel'];
		$_SESSION['fNacU'] = $row['fechNac'];
		$_SESSION['tipU'] = $row['tipoU'];

		header("location: ../index.php"); //?id=".$idU."-name=".$Nombre
		}

	else{
		echo("Info equivocada");
        header("../new.php");
	}
}
?>