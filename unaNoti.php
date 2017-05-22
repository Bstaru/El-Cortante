
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
<div class="lanoticia">
	<div class="lanotiCont"  id = "scroll">
		
		<div class="Noticia">

			<div class="textoNoti">		
				<?php
				$noticia=$_GET['idNoti'];
		        $mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
	  			$cuero = $mysqli -> query ("CALL s_noticia ('".$noticia."');");	  					
	  				
			    while ($valores = mysqli_fetch_array($cuero)) {	
			    	$idN 		= $valores[0];
			       	$titulo 	= $valores[1];
			       	$desc 		= $valores[2];
			       	$nomu 		= $valores[3];	
			       	$fecha 		= $valores[4];
			       	$cuerpo		= $valores[5];							
			    }
				$mysqli->close();
			?>
				<div class="imglaco">
					<a href=""><img src="img/like.png"></a>
				</div>	

				<h1><?php echo $titulo ?></h1> 		
				<h3><?php echo $desc ?></h3>
									<h4><?php echo $fecha ?></h4>
									<h4><?php echo $nomu ?></h4>

				<img src="img/noti2.jpg" alt="imagen noticia">

				<p>
					<?php echo $cuerpo ?>
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
	<script type="text/javascript" src="js/mostrarComment.js" ></script>
	<script type="text/javascript" src="js/verFecha.js" ></script>
</body>

</html>