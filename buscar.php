
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
		
	<ul>
		<a href="">
			<li>
				<h3>Titulo</h3>
				<h4>Descripcion</h4>
				<img class="imgResulNoti" src="img/noti2.jpg">
			</li>
		</a> 
		<a href="">
			<li>
				<img class="imgResulU" src="img/1-blubber-brothers.jpg">
				<h5 class="NomURes">Nombre de usuario/Reportero</h5>
			</li>
		</a> 
		<a href="">
			<li>
				<h3>Titulo</h3>
				<h4>Descripcion</h4>
				<img class="imgResulNoti" src="img/noti2.jpg">
			</li>
		</a> 
		<a href="">
			<li>
				<img class="imgResulU" src="img/1-blubber-brothers.jpg">
				<h5 class="NomURes">Nombre de usuario/Reportero</h5>
			</li>
		</a> 
		<a href="">
			<li>
				<img class="imgResulU" src="img/1-blubber-brothers.jpg">
				<h5 class="NomURes">Nombre de usuario/Reportero</h5>
			</li>
		</a> 
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