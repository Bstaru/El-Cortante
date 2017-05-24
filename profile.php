

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
	<div class = "datos" id = "scroll">
		<div class = "fotito">
			<img src="data:image/jpeg;base64,<?php echo $img ?>"/>
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
							<?php
			        		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  					$cuero = $mysqli -> query ("CALL s_megusta_usuario ('".$idU."')");	  					 					
				          	while ($valores = mysqli_fetch_array($cuero)) {
				          	
				          			$idN = $valores[0];
				          			$mysqli2 = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
						          	$cuero2 = $mysqli2 -> query("CALL s_media_img('".$idN."');");
									while ($valores2 = mysqli_fetch_array($cuero2)) {
									    $imagencita = $valores2[0];				
									}					    
									if($imagencita == ''){
									    $imagencita = 'media/noimg.png';
									}
									$mysqli2->close();
				            	echo '	<article style="background-image: url('.$imagencita.');
														background-repeat: no-repeat; 
														background-size: cover;
														background-position: 50% 50%;"	>
											<h2 style="text-align: center">'.$valores[1].'</h2>

										</article>';				
				          	}
							$mysqli->close();
				        ?>
					</section>
				</article>
				<?php 
						if ($TipU == 'reportero') {?>
							<style>
								.cuadro3,.cuadro4, .hacerNoti{display: inline;}
							</style>
							<?php
							}
						else{?>
							<style>
								.cuadro3,.cuadro4, .hacerNoti{display: none;}
							</style>
							<?php
							}	
				?>
				<article class = "cuadro3"> <!--este sólo para reporteros-->
					<h3>Notas aprobadas</h3>
					<hr>
					<section>
						<?php
			        		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  					$cuero = $mysqli -> query ("CALL s_noticia_usuario_si ('".$idU."')");	  					
		  					
				          	while ($valores = mysqli_fetch_array($cuero)) {	
				          		if ($valores[3] == 1){
				          			$valores[3] = 'Si';
				          		}
				          			$idN = $valores[5];
				          			$mysqli2 = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
						          	$cuero2 = $mysqli2 -> query("CALL s_media_img('".$idN."');");
									while ($valores2 = mysqli_fetch_array($cuero2)) {
									    $imagencita = $valores2[0];				
									}					    
									if($imagencita == ''){
									    $imagencita = 'media/noimg.png';
									}
									$mysqli2->close();
				            	echo '	<article style="background-image: url('.$imagencita.');
														background-repeat: no-repeat; 
														background-size: cover;
														background-position: 50% 50%;"	>
											<h2>'.$valores[0].'</h2>
											<h3>Aprobado: '.$valores[3].'</h3>

										</article>';				
				          	}
							$mysqli->close();
				        ?>
				 
					</section>
				</article>
				<article class = "cuadro4"> <!--este sólo para reporteros-->
					<h3>Notas pendientes</h3>
					<hr>
					<section>
						<?php
			        		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  					$cuero = $mysqli -> query ("CALL s_noticia_usuario_no ('".$idU."')");	  					
		  					
				          	while ($valores = mysqli_fetch_array($cuero)) {	
				          		if ($valores[3] == 0){
				          			$valores[3] = 'No';
				          		}
				          		$idN = $valores[5];
				          			$mysqli2 = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
						          	$cuero2 = $mysqli2 -> query("CALL s_media_img('".$idN."');");
									while ($valores2 = mysqli_fetch_array($cuero2)) {
									    $imagencita = $valores2[0];				
									}					    
									if($imagencita == ''){
									    $imagencita = 'media/noimg.png';
									}
									$mysqli2->close();
				            	echo '	<article style="background-image: url('.$imagencita.');
														background-repeat: no-repeat; 
														background-size: cover;
														background-position: 50% 50%;"	>
											<h2>'.$valores[0].'</h2>
											<h3>Aprobado: '.$valores[3].'</h3>

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