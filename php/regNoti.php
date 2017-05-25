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

	$imagg = 'media/'.basename($_FILES['imgNnoti']['name']);

	$dat = basename($_FILES['imgNnoti']['name']);
	$rest = substr($dat, -4);
	
	if ($rest == '.mp4') {
		$uploaddir = '../media/'.time().'mp4';
	}
	else {
		$uploaddir = '../media/'.time().'jpg';
	}

    $uploadfile = $uploaddir.basename($_FILES['imgNnoti']['name']);


    if (move_uploaded_file($_FILES['imgNnoti']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }

	$sql = "CALL i_noticia_cImg( '".$Titulo."', '".$Descrip."', '".$Cuerpo."', '".$Usuario."', '".$Seccion."', '".$imagg."');";

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


