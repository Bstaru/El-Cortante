<?php

require('php/conection.php');
session_start();

if( isset($_SESSION["IdUserReg"]) ){ ?>
	<style>
		.usuario, .logout{
			display: inline;
		}
		.new, .login{
			display: none;
		}
	</style>
	<?php

	$idU = $_SESSION["IdUserReg"];
	$Nombre = $_SESSION['NombreUserR'];
	$ApP = $_SESSION['APU'];
	$ApM = $_SESSION['AMU'];
	$Tel = $_SESSION['telU'];
	$FeN = $_SESSION['fNacU'];
	$TipU = $_SESSION['tipU'];

	if ($TipU == 'reportero') {?>
		<style>
			.hacerNoti,.cuadro3,.newNoticia{
				display: inline;
			}
		</style>
	<?php
	}
	else{?>
		<style>
			.hacerNoti,.cuadro3,.newNoticia{
				display: none;
			}
		</style>
	<?php
	}	
}
else{?>
	<style>
		.usuario, .logout{
			display: none;
		}
		.newNoticia{display: none;}
		.new, .login{
			display: inline;
		}
	</style>
<?php
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Noticiero</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img\cc.ico">			
	<script type="text/javascript" src="js/jquery-2.1.4.min.js" ></script>	
	<link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>

<!--HEADER INICIO-->

	<div class = "registroCont">
		<div class = "linea"></div>	
		<div class = "registro">

			<div class = "botones">
				<a  href="new.php" class = "new" id = "new">Registrarme </a>
				<a  href="#" class = "login" id = "login">Iniciar Sesión </a>
				<a href="newNoti.php" class="newNoticia"> Nueva Noticia </a>
				<a href="php/logout.php" class="logout">Cerrar Sesión </a>				
			</div>

			<div class = "usuario">
				<img src="img/user.png">
				<a href="profile.php?<?php echo $Nombre, $ApP, $ApM ?>" ><?php echo $Nombre ?> <?php echo $ApP ?> <?php echo $ApM ?></a>
			</div>
		</div>
	</div>

	<div class = "sesionCont" id ="sesionCont" style = "display:none;" >
		<div class = "sesion">
			<form class = "formLog" name = "formLog" action="php/logeate.php"  method="POST" >

				<input type = "text" name = "correoInp" class ="correo" required placeholder = "Correo electrónico"><div class = "f1"><img class = "flechita1" /></div>
				<input type = "text" name = "contraInp" class = "contra" required placeholder = "Contraseña">
				<div class = "f2"><img class = "flechita2" /></div>
				<input type = "button" class = "oksesion" value = "Iniciar Sesión">

			</form>

			<input type = "button" class = "cancelsesion" id = "cancelsesion" value = "X">
		</div>
	</div>

	<div class = "cosasCont">	
		<div class = "cosas">
		  	<table>
				<tr>
					<td class = "climaCont">
						<div class = "lugar">
							<p>Machete, ASP</p>
						</div>
						<div class = "elclima">
							<div class="icon" data-icon="I"></div>
							<p>21°C</p>
						</div>
						<div class = "fecha">
							<p id = "fecha"></p>
						</div>
					</td>
					<td class = "logoCont">
						<a href="index.php"><img src="img/logo.png" class = "logo"></a>
						<p>Periodismo directo</p>
					</td>
					<td class = "buscarContT">
						<form class = "buscarCont">
							<input type ="text" class = "buscarAlgo" placeholder = "Buscar...">
							<input type = "button" class = "buscarOk" >
						</form>
					</td>
				</tr>
			</table>
		</div>	
	</div>

	<div class = "headerContMenu">
		<div class = "headerMenu">
			<table>
				<tr> <!--tr es como el contenedor. El th es para el encabezado de ahi van los td-->
					<td class = "home"><a href="index.php">INICIO</a></td>
					<td><a href="noticias.php">LOCAL</a></td>				
					<td><a href="">NACIONAL</a></td>
					<td><a href="">INTERNACIONAL</a></td>
					<td><a href="">CLIMA</a></td>
					<td><a href="">DEPORTES</a></td>
					<td><a href="">ESPECTÁCULOS</a></td>
					<td><a href="">VIDA Y ESTILO</a></td>
					<td><a href="">TRENDING TOPIC</a></td>
				</tr>
			</table>	
		</div>
	</div>

<!--HEADER FIN-->


<!--HEADER FIN-->

<div class = "datosCont">
	<div class = "datos">
		<div class = "fotito">
			<img src="img/user.png"/>
		</div>

		<div class = "alldata">
			<section>
				<article class = "cuadro1">
					<ul>
						<li>Nombre: <?php echo $Nombre ?> <?php echo $ApP ?> <?php echo $ApM ?></li>
						<li>Tipo: <?php echo $TipU ?></li>
						<li>Fecha de nacimiento: <?php echo $FeN ?></li>
						<li>Telefono: <?php echo $Tel ?></li>
					</ul>
				</article>

				<article class = "cuadro2">
					<h3>Likes</h3>
					<hr>
					<section>
						<article></article>
						<article></article>
						<article></article>
						<article></article>
					</section>
				</article>

				<article class = "cuadro3"> <!--este sólo para reporteros-->
					<h3>Notas subidas(solo reportero)</h3>
					<hr>
					<section>
						<article></article>
						<article></article>
						<article></article>
						<article></article>
					</section>
				</article>

			</section>
		</div>

		<div class = "hacerNoti">
			<a href="newNoti.php"><img src="img/news-icon.png" title="Subir noticia" /></a>
		</div>
		<div class = "editPRo">
			<a href="editU.php"><img src="img/edit.png" title="Editar perfil" /></a>
		</div>

	</div>
</div>

<!--FOOTER INICIO-->
<div class = "piedepagCont">
	<div class = "piedepag">
		<section>
			<article>
					<ul>
					  <li class = "tituloli">EL CORTANTE</li>
					  <hr>
					  <li><a href="">Mi Perfil</a></li>
					  <li><a href="">Subscribirme</a></li>
					  <li><a href="">Configuraciones</a></li>
					</ul>
			</article>
			<article>
					<ul>
					  <li  class = "tituloli">NOTICIAS</li>
					  <hr>
					  <li><a href="">Locales</a></li>
					  <li><a href="">Nacionales</a></li>
					  <li><a href="">Internacional</a></li>
					  <li><a href="">Economía</a></li>
					  <li><a href="">Clima</a></li>
					  <li><a href="">Deportes</a></li>
					  <li><a href="">Espectáculos</a></li>
					  <li><a href="">Vida y Estilo</a></li>
					  <li><a href="">Tendencias</a></li>
					</ul>
			</article>
			<article>	
					<ul>
					  <li class = "tituloli">INFORMACIÓN</li>
					  <hr>
					  <li><a href="">Reporteros</a></li>
					  <li><a href="">Acerca de</a></li>
					  <li><a href="">Contáctanos</a></li>
					</ul>
			</article>
			<article>
				<ul>
					  <li class = "tituloli">SIGUENOS</li>
					  <hr>
					  <li class = "lilo"><a href="" class = "fb"></a></li>
					  <li class = "lilo"><a href="" class = "tt"></a></li>
					  <li class = "lilo"><a href="" class = "u2"></a></li>
					  <li style = "padding-left: 40px;">&copy 2017 EL CORTANTE</li>
					</ul>
			</article>				
		</section>	
	</div>
</div>
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