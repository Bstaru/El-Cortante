<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{

	$idN = mysqli_real_escape_string($mysqli,$_POST['idNotiNo']);

	$sql = "CALL u_noticia_si( '".$idN."');";

	$result=$mysqli->query($sql);
	header("location: ../todoAdmin.php");
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../index.php");
	}

$mysqli->close();
	 
?>