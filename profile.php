

<!DOCTYPE html>
<html>
<head>
	<title>El Cortante - Perfil</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
				<?php 
						if ($TipU == 'reportero') {?>
							<style>
								.cuadro3{display: inline;}
							</style>
							<?php
							}
						else{?>
							<style>
								.cuadro3{display: none;}
							</style>
							<?php
							}	
				?>
				<article class = "cuadro3"> <!--este sólo para reporteros-->
					<h3>Notas subidas</h3>
					<hr>
					<section>
						<?php
			        		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  					$cuero = $mysqli -> query ("CALL s_noticia_usuario ('".$idU."')");	  					
		  					
				          	for ($jej = 0; $jej < 4; $jej ++) {	
				          		$valores = mysqli_fetch_array($cuero);
				          		$apro = $valores[3];
				          		$bado = '';
				          		if ($apro == 1){
				          			$bado = 'Si';
				          		}
				          		else
				          		{
				          			$bado = 'No';
				          		}

				            	echo '	<article style="background-image: url(img/noti1.jpg);
														background-repeat: no-repeat; 
														background-size: cover;
														background-position: 50% 50%;"	>
											<h2>'.$valores[0].'</h2>
											<h3>Aprobado: '.$bado.'</h3>

										</article>';				
				          	}
							$mysqli->close();
				        ?>
				 
					</section>
				</article>

			</section>
		</div>

		<div class = "hacerNoti">
			<a href="newNoti.php"><img src="img/news-icon.png" title="Subir noticia" /></a>		
		</div>
		<div class = "editPro">
			<a href="editU.php"><img src="img/edit.png" title="Editar perfil" /></a>
		</div>

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