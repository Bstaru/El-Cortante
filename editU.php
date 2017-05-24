
<!DOCTYPE html>
<html>
<head>
	<title>El Cortante - Editar</title>
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

		<form action="php/editUser.php" class="formEdit" name="formEdit" method="POST" enctype="multipart/form-data">

			<div class = "descrip">
				<h3>Nombre</h3>		
				<h3>Apellido Paterno</h3>
				<h3>Apellido Materno</h3>
				<h3>Teléfono</h3>			
				<h3>Fecha de Nacimiento</h3>
			</div>

			<div class = "textos">
				<input type = "text" class = "idUserE" value = "<?php echo $idU  ?>" name = "idUserE" style = "display:none;">

				<input type = "text" class = "name" value = "<?php echo $Nombre ?>" name = "nameE"><div class = "f3"><img class = "flechita3" /></div>

				<input type = "text" class = "1lastname" required value = "<?php echo $ApP ?>"  name = "1lastnameE"> <div class = "f3"><img class = "flechita4" /></div>

				<input type = "text" class = "2lastname" required value = "<?php echo $ApM ?>"  name = "2lastnameE"><div class = "f3"><img class = "flechita5" /></div>

				<input type = "text" class = "tel" value = "<?php echo $Tel ?>" name = "telE"><div class = "f3"><img class = "flechita6" /></div>

				<input type = "date" class = "birth" value = "<?php echo $FeN ?>"  name="birthDE"><div class = "f3"><img class = "flechita8" /></div>
			
			</div>

			<div class = "fotito2">
				<div class = "coso1">
					<h3 class = "des">Arrastre la foto o haga click</h3>
				</div>
				<div class = "coso">
					<div class="uploader" onclick="$('#filePhoto').click()">
					    <img src="data:image/jpeg;base64,<?php echo $img ?>"/>
					    <input type="file" name="UpicE"  id="filePhoto" value = "<?php echo $img ?>"/>
					</div>				
				</div>
			</div>

			<div class = "btnEdit">
				<input type = "button" class = "okedit" value = "Aceptar">
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