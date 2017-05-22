

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

<div class="admonss">
	<div class="contA"  id = "scroll">
		<h1 style="margin-left: 10px;">APRUEBA O NO NOTICIAS</h1>	
	<ul>
			<li>
				<div class="tituloss">		
					<h3>Titulo</h3>
					<h4>Usuario</h4>
					<h4>fecha</h4>
					<h4>seccion</h4>
				</div>
				<div class="imgnotiss">
					<img class="imgResulNoti" src="img/noti2.jpg">
				</div>
				<div class="botonesA">
					<a href="#" class="botonSi"><img src="img/si.png"></a>

					<a href="#" class="botonNo"><img src="img/no.png"></a>
				</div>
			</li>
		
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