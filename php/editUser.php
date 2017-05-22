<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$idU = $_SESSION["ID"];

	$Name = mysqli_real_escape_string($mysqli,$_POST['nameE']);
	$Last1 = mysqli_real_escape_string($mysqli,$_POST['1lastnameE']);
	$Last2 = mysqli_real_escape_string($mysqli,$_POST['2lastnameE']);
	$Tel = mysqli_real_escape_string($mysqli,$_POST['telE']);
	$Bday = mysqli_real_escape_string($mysqli,$_POST['birthDE']);

	$error = '';
	
	$sql = "CALL u_usuario( '".$idU."', '".$Name."', '".$Last1."', '".$Last2."','".$Tel."', '".$Bday."', 1, 'null');";

	//echo($sql);

	$result=$mysqli->query($sql);

	header("location: ../profile.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../editU.php");
	}

$mysqli->close();
	 
?>