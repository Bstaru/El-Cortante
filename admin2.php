
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

<div class="admonss">
	<div class="contA"  id = "scroll">
		<h1 style="margin-left: 10px;">ELIMINA USUARIOS</h1>
	
	<ul>
		<?php
			$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
		  	$cuero = $mysqli -> query ("CALL s_usuario_bye");  					
		  	while ($valores = mysqli_fetch_array($cuero)) {	
		  		$imgU = base64_encode($valores[2]);
				echo '<li>
						<form action="php/byeUser.php" class="formYesNoti" name="formYesNoti" method="POST">
						<div class="imgnotiss2">
							<img class="imgResulNoti2" src = "data:image/jpeg;base64,'.$imgU.'">
						</div>
						<div class="tituloss2">		
							<h3>'.$valores[1].'</h3>
							<h4>'.$valores[3].'</h4>
							<input type = "text" style = "display:none;" name = "idByeU" class = "idByeU" value = "'.$valores[0].'">
						</div>
						
						<div class="botonesA">		
							<a href="#" class="botonBye"><img src="img/no.png"></a>			
						</div>
						</form>
					</li>
				';				
			}
			$mysqli->close();
		?>
		
	</ul>
	<script>			
		$(document).ready(function(){
		   
			$(".botonBye").click(function() {
				$(this).parent().parent().submit();
			});
			 
		});
	</script>
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