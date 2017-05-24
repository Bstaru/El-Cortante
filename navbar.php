<?php

$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

	if(	isset($_SESSION['ID']) ){ ?>
		<style>
			.usuario, .logout{
				display: inline;
			}
			.new, .login{
				display: none;
			}
		</style>
		<?php

		$idU 	= $_SESSION['ID'];
		$TipU 	= $_SESSION['TYPE'];
		$Mail 	= $_SESSION['MAIL'];		

		if ($TipU == 'reportero') {?>
			<style>
				.newNoticia{display: inline;}
			</style>
			<?php
			}
		else{?>
			<style>
				.newNoticia{display: none;}
			</style>
			<?php
			}	
		if ($TipU == 'admin') {?>
			<style>
				.admon{display: inline;}
			</style>
			<?php
			}
		else{?>
			<style>
				.admon{display: none;}
			</style>
			<?php
			}	

		$cuero = $mysqli -> query ("CALL s_usuario('".$idU."');");	
		while ($valores = mysqli_fetch_array($cuero)) {	
				    	$Nombre	= $valores[0];
				       	$ApP 	= $valores[1];
				       	$ApM 	= $valores[2];
				       	$Tel 	= $valores[4];	
				       	$FeN 	= $valores[5];
				      	$img 	= base64_encode($valores[6]);	
		}
	}
	else{?>
		<style>
			.usuario, .logout{
				display: none;
			}
			.newNoticia,.admon{display: none;}
			.new, .login{
				display: inline;
			}
		</style>
	<?php
	}
$mysqli->close();
?>

	<div class = "registroCont">
		<div class = "linea"></div>	
		<div class = "registro">

			<div class = "botones">
				<a  href="new.php" class = "new" id = "new"> Registrarme </a>
				<a  href="#" class = "login" id = "login"> Iniciar Sesión </a>
				<a  href="newNoti.php" class="newNoticia"> Nueva Noticia </a>
				<a  href="todoAdmin.php" class="admon"> Admin </a>	
				<a  href="php/logout.php" class="logout"> Cerrar Sesión </a>				
			</div>

			<div class = "usuario">
				<img src="data:image/jpeg;base64,<?php echo $img ?>">
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
						<form class = "buscarCont" name = "formBuscar" action="php/busGral.php" method="POST" >
							<input type ="text" class = "buscarAlgo" name = "buscarAlgo" placeholder = "Buscar...">
							<input type = "button" class = "buscarOk" >
						</form>
						<script>
				
						</script>
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
					<?php
						$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  					$query = $mysqli -> query ("CALL s_seccion");	  					
		  					
				          	for ($i = 0; $i < 7; $i ++) {	
				          		$valores = mysqli_fetch_array($query);
				            	echo '<td><a href="noticias.php?idSec='.$valores[0].'">'.$valores[1].'</a></td>';				
				          	}
						$mysqli->close();
			        ?>
				</tr>
			</table>	
		</div>
	</div>

	<script src="js/busqueda.js" ></script>