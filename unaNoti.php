<?php

require('php/conection.php');
session_start();

if(	isset($_SESSION["IdUserReg"])){ ?>
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
			.newNoticia{
				display: inline;
			}
		</style>
	<?php
	}
	else{?>
		<style>
			.newNoticia{
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
				<a  href="new.php" class = "new" id = "new"> Registrarme </a>
				<a  href="#" class = "login" id = "login"> Iniciar Sesión </a>
				<a  href="newNoti.php" class="newNoticia"> Nueva Noticia </a>	
				<a  href="php/logout.php" class="logout"> Cerrar Sesión </a>				
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

<div class="lanoticia">
	<div class="lanotiCont"  id = "scroll">
		
		<div class="Noticia">

			<div class="textoNoti">		

				<div class="imglaco">
					<a href=""><img src="img/like.png"></a>
				</div>	

				<h1>TITULO</h1> 		
				<h3>Descripcion</h3>
									<h4>Domingo 23 de Abril, 2017</h4>
									<h4>AUTOR jeje</h4>

				<img src="img/noti2.jpg" alt="imagen noticia">

				<p>
					Cuerpo de la noticia. 
					<br>
					"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
					<br>
					"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?".
					<br>
					"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
					<br>

					"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga."
					<br>
				</p>
				
			</div>
		</div>

		<div class="Commentar">
			<div class="Comentt">
				<div class="fotoComent">
					<img src="img/user.png">
				</div>
				<form class="coment">
					<input type="text" name="comentar" id="txtCo">
					<button id="Comentar">Comentar</button>
				</form>
			</div>

			<div class="Comentarios">
				<ul >		

					<li class="unComent">
						<div class="fotoComent">
							<img src="img/user.png">
						</div>
						<p>El comentario</p>

						<div class="btnComent">
							<button id="btnCo">Comentar</button>
						</div>

							<ul>
								<li class="unComentenComent">
									<div class="fotoComent">
										<img src="img/user.png">
									</div>
									<p>El comentario del comentario</p>
								</li>
							</ul>

						<div class="Comentt2" id = "comentario2" style = "display:none;">
							<form class="coment2">
								<input type="text" name="comentar" id="txtCo2">
								<button id="Comentar">Comentar</button>
								<button id="ComentarNo">Cancelar</button>
							</form>
						</div>
					</li>

					<li class="unComent">
						<div class="fotoComent">
							<img src="img/user.png">
						</div>
						<p>Otro comentario mas grande. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
						
						<div class="btnComent">
							<button id="btnCo2">Comentar</button>
						</div>

						<div class="Comentt3" id = "comentario3" style = "display:none;">
							<form class="coment3">
								<input type="text" name="comentar" id="txtCo3">
								<button id="Comentar2">Comentar</button>
								<button id="ComentarNo2">Cancelar</button>
							</form>
						</div>
					</li>
				</ul>
			</div>
			
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
	<script type="text/javascript" src="js/mostrarComment.js" ></script>
	<script type="text/javascript" src="js/verFecha.js" ></script>
</body>

</html>