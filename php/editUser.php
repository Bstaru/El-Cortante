<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$idU = mysqli_real_escape_string($mysqli,$_POST['idUserE']);
	$nombre = mysqli_real_escape_string($mysqli,$_POST['nameE']);
	$app = mysqli_real_escape_string($mysqli,$_POST['1lastnameE']);
	$apm = mysqli_real_escape_string($mysqli,$_POST['2lastnameE']);
	$tel = mysqli_real_escape_string($mysqli,$_POST['telE']);
	$fecha = mysqli_real_escape_string($mysqli,$_POST['birthDE']);
	$imgdta = addslashes(file_get_contents($_FILES['UpicE']['tmp_name']));

	$sql = "CALL u_usuario('".$idU."', '".$nombre."','".$app."','".$apm."','".$tel."','".$fecha."','{$imgdta}');";

	//echo($sql);

	$result=$mysqli->query($sql);

	header("location: ../profile.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../index.php");
	}

$mysqli->close();
	 
?>