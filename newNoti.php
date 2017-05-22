
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

<header>
	<?php
	require("navbar.php");
	?>
</header>

<!--HEADER FIN-->
<div class = "datosNN">
	<div class = "datosNN">
		<form class = "formNN" name = "formNN" action="php/regNoti.php" method="POST">
			<div class="dataNN" >

				<input type="text" name="userNN" class="userNN" value="<?php echo $idU ?>" style = "display: none;">

				<h2>Título: </h2><input type="text" name="titu" class="titulo" required placeholder="Título">
				<h2>Sección: </h2>

				<select name = "section" class = "section"  required placeholder = "Seccion">
	  				<?php
	  					$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
	  					$query = $mysqli -> query ("CALL s_seccion");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "seccion" value = "'.$valores[idSec].'">'.$valores[nomSec].'</option>';				
			          	}
						$mysqli->close();
			        ?>

				</select>

				<h2>Descripcion: </h2>		
				<textarea name = "desc" class="descp"></textarea>
			</div>
			<div class="dataNN3">
				<div class="formOKfn">
					<input id="uploadFile" placeholder="Choose File" disabled="disabled" />
					<div class="fileUpload okfile">
						<span>Escoger</span>
						 <input id="uploadBtn" type="file" class="upload2" />
					</div>

					<input type="button" name="okFotoN" class="okFotoN" id="okFotoN" value="Ok">

					<script>
						document.getElementById("uploadBtn").onchange = function () {
							document.getElementById("uploadFile").value = this.value;
						};
					</script>
				</div>

				<div  id = "scroll" class="contFotos" style="background-color: white;">
				 	<img id="profile-img-tag" src="img/1-blubber-brothers.jpg">
				 	<video>
	  					<source src="img/nya.mp4" type="video/mp4">
				 	</video>
				</div>
			</div>		
			<div class="dataNN2">			
				<h2>Cuerpo: </h2>		
				<textarea name = "cue" class="cuerpo"></textarea>
			</div>	
			<div class = "btnAcept2">
				<input type = "button" class = "oknewN" value = "Aceptar">
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
	<script type="text/javascript" src="js/verFotosN.js" ></script>	
	<script type="text/javascript" src="js/NuevaNoti.js" ></script>
</body>

</html>