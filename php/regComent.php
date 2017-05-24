<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$idNoti = mysqli_real_escape_string($mysqli,$_POST['idnoticia']);
	$cont = mysqli_real_escape_string($mysqli,$_POST['comentar']);
	$idU = mysqli_real_escape_string($mysqli,$_POST['idusuario']);

	
	$sql = "CALL i_comentario( '".$idNoti."', '".$cont."', '".$idU."');";

	echo($sql);

	$result=$mysqli->query($sql);

	header("location: ../unaNoti.php?idNoti=".$idNoti);
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../index.php");
	}

$mysqli->close();	
	 
?>