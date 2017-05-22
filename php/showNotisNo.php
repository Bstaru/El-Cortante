<?php

	$sql = "CALL s_noticia_no ";
	echo($sql);

	$result=$conexion->query($sql);
	$rows = $result->num_rows;

	if($rows > 0){
		$row = $result->fetch_assoc();

		$Titulo = $row['nombreU'];
		$Usuario = $row['AP'];
		$Aprobado = $row['AM'];
		$Seccion = $row['tel'];
		$Activo = $row['fechNac'];

		echo("$rows");
		}

	else{
		echo("chale :c");
        header("../index.php");
	}
?>