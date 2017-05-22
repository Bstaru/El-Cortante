
<!DOCTYPE html>
<html>
<head>
	<title>El Cortante - Registrarse</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img\cc.ico">			
	<script type="text/javascript" src="js/jquery-2.1.4.min.js" ></script>		
    <link href="https://fonts.googleapis.com/css?family=Exo&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!--HEADER INICIO-->

<header>
	<?php
	require("navbar.php");
	?>
</header>

<!--HEADER FIN-->
<div class = "datosCont">
	<div class = "datos">

		<form action="php/regUser.php" class="formNew" name="formNew" method="POST" enctype="multipart/form-data">

			<div class = "descrip">
				<h3>Nombre</h3>		
				<h3>Apellido Paterno</h3>
				<h3>Apellido Materno</h3>
				<h3>Teléfono</h3>
				<h3>Tipo</h3>				
				<h3>Fecha de Nacimiento</h3>
				<h3>Correo</h3>
				<h3>Contraseña</h3>	
			</div>

			<div class = "textos">

				<input type = "text" class = "name" required placeholder = "Nombre" name = "name"><div class = "f3"><img class = "flechita3" /></div>

				<input type = "text" class = "1lastname" required placeholder = "Apellido Materno" name = "1lastname"> <div class = "f3"><img class = "flechita4" /></div>

				<input type = "text" class = "2lastname" required placeholder = "Apellido Paterno" name = "2lastname"><div class = "f3"><img class = "flechita5" /></div>

				<input type = "text" class = "tel" required placeholder = "Teléfono"  name = "tel"><div class = "f3"><img class = "flechita6" /></div>

				<select name = "type" class = "type"  required placeholder = "Tipo" >

	  				<option class = "op" name= "typeU" value="usuario">Lector</option>

	  				<option class = "op" name= "typeU" value="reportero">Reportero</option>

				</select>

				<div class = "f3"><img class = "flechita7" /></div>

				<input type = "date" class = "birth" required placeholder = "Fecha Nacimiento" name="birthD"><div class = "f3"><img class = "flechita8" /></div>

				<input type = "text" class = "mail" required placeholder = "Correo" name="email"><div class = "f3"><img class = "flechita9" /></div>

				<input type = "text" class = "contraa" required placeholder = "Contraseña" name="contraa"><div class = "f3"><img class = "flechita10" /></div>
								
			</div>

			<div class = "fotito2">
				<div class = "coso1">
					<h3 class = "des">Arrastre la foto o haga click</h3>
				</div>
				<div class = "coso">
					<div class="uploader" onclick="$('#filePhoto').click()">
					    <img src="img/user.png"/>
					    <input type="file" name="Upic"  id="filePhoto" />
					</div>				
				</div>
			</div>

			<div class = "btnAcept">
				<input type = "button" class = "oknew" value = "Aceptar">
			</div>
		</form>
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
	<script type="text/javascript" src="js/verFoto.js" ></script>
	<script type="text/javascript" src="js/verFecha.js" ></script>
</body>

</html>