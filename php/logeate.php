<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

	$Correo = mysqli_real_escape_string($mysqli,$_POST['correoInp']);
	$Password = mysqli_real_escape_string($mysqli,$_POST['contraInp']);
	$error = '';
	
	$sql = "CALL s_usuario_login('".$Password."','".$Correo."'); ";
	$result=$mysqli->query($sql);
	$rows = $result->num_rows;	
        
	if($rows > 0){
		$row = $result->fetch_assoc();

		$_SESSION['ID'] = $row['idUsuario'];	
		$_SESSION['NAME'] = $row['nombreU'];
		$_SESSION['APU'] = $row['AP'];
		$_SESSION['AMU'] = $row['AM'];
		$_SESSION['MAIL'] = $row['email'];
		$_SESSION['TEL'] = $row['tel'];
		$_SESSION['BDAY'] = $row['fechNac'];
		$_SESSION['TYPE'] = $row['tipoU'];

		header("location: ../index.php"); //?id=".$idU."-name=".$Nombre
		}

	else{
		echo("Info equivocada");
        header("../new.php");
	}
$mysqli->close();


?>