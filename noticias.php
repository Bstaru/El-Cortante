

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
	
	<div class = "notiCont">
		<div class = "noti" id = "scroll">
			<?php
			$sec=$_GET['idSec'];
		        $mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
	  			$cuero = $mysqli -> query ("CALL s_noticia_sec ('".$sec."');");	  					
	  				
			    while ($valores = mysqli_fetch_array($cuero)) {	
			        echo '<div class = "laNoti">
							<a href="unaNoti.php?idNoti='.$valores[0].'" class = "miniNoti">
								<h4>'.$valores[1].'</h4>
								<p>'.$valores[2].'</p>
							</a>
						</div>';				
			    }
				$mysqli->close();
			?>
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