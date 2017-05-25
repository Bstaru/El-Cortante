<?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$Name = mysqli_real_escape_string($mysqli,$_POST['name']);
	$Last1 = mysqli_real_escape_string($mysqli,$_POST['1lastname']);
	$Last2 = mysqli_real_escape_string($mysqli,$_POST['2lastname']);
	$Tel = mysqli_real_escape_string($mysqli,$_POST['tel']);
	$Type = mysqli_real_escape_string($mysqli,$_POST['type']);
	$Bday = mysqli_real_escape_string($mysqli,$_POST['birthD']);
	$Mail = mysqli_real_escape_string($mysqli,$_POST['email']);
	$Pass = mysqli_real_escape_string($mysqli,$_POST['contraa']);
	$imgdta = addslashes(file_get_contents($_FILES['Upic']['tmp_name']));
	
	$sql = "CALL i_usuario( '".$Pass."', '".$Name."', '".$Last1."', '".$Last2."', '".$Mail."', '".$Tel."', '".$Bday."', '".$Type."', '{$imgdta}');";

	//echo($sql);

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