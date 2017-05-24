
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
		<h4>Busqueda por:</h4>
		<select>
			<option>Usuario</option>
			<option>Noticia</option>
			<option>fecha</option>
		</select>
	</div>


	<ul>
	<?php
		$busqueda=$_GET['bus'];
		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		$cuero = $mysqli -> query ("CALL s_busqueda_general( '".$busqueda."');");	  					
		  					
		while ($valores = mysqli_fetch_array($cuero)) {	
			if($valores[5] != '' && $valores[6]!= ''){
				echo '			
				<a href="">
					<li>
						<h3>'.$valores[5].'</h3>
						<h4>'.$valores[6].'</h4>
						<img class="imgResulNoti3" src="img/noti2.jpg">
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