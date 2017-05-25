
<!DOCTYPE html>
<html>
<head>
	<title>Noticiero</title>
	<meta charset="UTF-8">
	
	<link rel="icon" href="img\cc.ico">			
	<script type="text/javascript" src="js/jquery-2.1.4.min.js" ></script>	
	<link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
<!--HEADER INICIO-->

<header>
	<?php
	require("navbar.php");
	?>
</header>

<!--HEADER FIN-->

<div class="busquedas">
	<div class="laBus"  id = "scroll">

	<div class="filtro">
		<span>Busqueda por:</span>
		<select>
			<option id="Buser">Usuario</option>
			<option id="Bnoti">Noticia</option>
			<option id="Bfecha">fecha</option>
		</select>

	<form class = "busXu" name = "formBusXu" action="php/busUser.php" method="POST" >
		<input type="text" name="busUser" placeholder="Busqueda...">
		<input type="button" class = "okbusUSer" name="okbusUSer" value="Buscar">
	</form>
	<script>
		$(document).ready(function(){					   
			$(".okbusUSer").click(function() {
			$(this).parent().submit();
		});
							 
	</script>

	</div>


	<ul>
	<?php
		$busqueda=$_GET['bus'];
		if($busqueda != ''){
		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		$cuero = $mysqli -> query ("CALL s_busqueda_general( '".$busqueda."');");	  					
		  					
		while ($valores = mysqli_fetch_array($cuero)) {	
			if($valores[5] != '' && $valores[6]!= ''){
				echo '			
				<a href="unaNoti.php?idNoti='.$valores[4].'">
					<li>
						<h3>'.$valores[5].'</h3>
						<h4>'.$valores[6].'</h4>
						<img class="imgResulNoti3" src="'.$valores[8].'">
					</li>
				</a> ';
			}
			else if($valores[1] != '' && $valores[2]!= '' && $valores[3]!= ''){
				echo '	
				<a href="">
					<li>
						<img class="imgResulU" src="img/1-blubber-brothers.jpg">
						<h5 class="NomURes">'.$valores[1] + $valores[2] + $valores[3].'</h5>
					</li>
				</a> ';
			}
							
		}
		$mysqli->close();
	}
	?>


	<?php

		$busqueda2=$_GET['busU'];
		if($busqueda2 != ''){
		$mysqli2 = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		$cuero2 = $mysqli2 -> query ("CALL s_busqueda_user( '".$busqueda2."');");	  					
		  					
		while ($valores2 = mysqli_fetch_array($cuero2)) {	
			
				echo '	
				<a href="">
					<li>
						<img class="imgResulU" src="data:image/jpeg;base64,'.$valores2[4].'">
						<h5 class="NomURes">'.$valores2[1] + $valores2[2] + $valores2[3].'</h5>
					</li>
				</a> ';
			
							
		}
		$mysqli2->close();
		}
		
	?>
	</ul>

	</div>
</div>

<!--FOOTER INICIO-->
	<?php
	require("footer.php");
	?>
<!--FOOTER FIN-->

<div id="irarriba">
	<a href="#"><img src = "img/arriba.png"></a>
</div>


<!--JS-->	
	<script type="text/javascript" src="js/scroll.js" ></script>
	<script type="text/javascript" src="js/menu.js" ></script>
	<script type="text/javascript" src="js/mostrar.js" ></script>
	<script type="text/javascript" src="js/verFecha.js" ></script>
</body>

</html>