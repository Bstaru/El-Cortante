
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

			        $mysqli2 = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  			$cuero2 = $mysqli2 -> query ("CALL s_megusta ('".$noticia."');");	  					
		  				
				    while ($valores2 = mysqli_fetch_array($cuero2)) {	
				    	$cantidad = $valores2[0];						
				       	}

					$mysqli2->close();
				?>

				<div class="cantLikes">
					<span>LIKES: <?php echo $cantidad ?></span>
				</div>

				<div class="imglaco">
					<form action="php/regLike.php" class="laco" name="laco" method="POST">
						<input type="text" value="<?php echo $noticia ?>" name="idNlaco" style="display: none;">					
						<input type="text" value="<?php echo $_SESSION['ID'] ?>" name="idUlaco" style="display: none;">		
						<a href="#" class="lacos"><img src="img/like.png"></a>
					</form>
					<script>			
						$(document).ready(function(){					   
							$(".lacos").click(function() {
								$(this).parent().submit();
							});
							 
						});
					</script>
				</div>	

				<h1><?php echo $titulo ?></h1> 		
				<h3><?php echo $desc ?></h3>
									<h4><?php echo $fecha ?></h4>
									<h4><?php echo $nomu ?></h4>
				<?php
					$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
					$cuero = $mysqli -> query ("CALL s_media_img('".$idN."');");
					while ($valores = mysqli_fetch_array($cuero)) {	
				    	$path 		= $valores[0];
				       	
				       	echo '<img src="'.$path .'" alt="imagen noticia">';					
				    }
					$mysqli->close();

					$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
					$cuero = $mysqli -> query ("CALL s_media_video('".$idN."');");
					while ($valores = mysqli_fetch_array($cuero)) {	
				    	$path2		= $valores[0];
				       	
				       	echo '<video width="550" height="auto" controls>
							  	<source src="'.$path2 .'" type="video/mp4">
							  </video>';					
				    }
					$mysqli->close();
				?>

				<p>
					<?php echo $cuerpo ?>
				</p>
				
			</div>
		</div>

		<div class="Commentar">
			<div class="Comentt">
				<div class="fotoComent">
					<?php 
						if(	isset($_SESSION['ID']) ){
							echo '<img src="data:image/jpeg;base64,'.$img.'">';
						}
						else{
							echo '<img src="img/user.png">';
						}
					?>					
				</div>

				<form action="php/regComent.php" class="coment" name="coment" method="POST">
					<input type="text" value="<?php echo $noticia ?>" name="idnoticia" style="display: none;">
					<input type="text" value="<?php echo $_SESSION['ID'] ?>" name="idusuario" style="display: none;">
					<input type="text" name="comentar" id="txtCo">
					<button id="Comentar">Comentar</button>
				</form>

				<script>
				$(document).ready(function(){

				    $('.oknewSec').on('click',function() {
				      var cmnt= $("#txtCo").val();
						if((cmnt!="")){         
					       $(".coment").submit();
					       $("#txtCo").val('');
					    }
					    else{
						    if(cmnt==""){
						    	$("#txtCo").css ("border-color","#fc6a6a");
						    }
				       	}
				    });
				});			
				</script>
			</div>

			<div class="Comentarios">
				<ul >		
					<?php
					$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
					$cuero = $mysqli -> query ("CALL s_comentario('".$idN."');");
					while ($valores = mysqli_fetch_array($cuero)) {	
				    	$idComt 	= $valores[0];
				    	$idNott 	= $valores[1];
				    	$Cmt 		= $valores[2];
				    	$fechaCmt 	= $valores[3];
				    	$userCmt 	= $valores[4];
				    	$imgUCmt	= base64_encode($valores[5]);
				       	
				       	echo '<li class="unComent">
								<div class="fotoComent2">
									<img src="data:image/jpeg;base64,'.$imgUCmt.'">
								</div>
								<h3 class="nomUserC">'.$userCmt.'</h3> <h4 class="fechaCom">'.$fechaCmt.'</h4>
								<br>
								<p>'.$Cmt.'</p>
							</li>';					
				    }
					$mysqli->close();
				?>
					<!--li class="unComent">
						<div class="fotoComent2">
							<img src="img/user.png">
						</div>
						<h3 class="nomUserC">USUARIO</h3> <h4 class="fechaCom">FECHA</h4>
						<br>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

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
					</li-->

						
				
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