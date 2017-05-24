
<!DOCTYPE html>
<html>
<head>
	<title>El Cortante - Inicio</title>
	<meta charset="UTF-8">
	
	<link rel="icon" href="img\cc.ico">			
	<script type="text/javascript" src="js/jquery-2.1.4.min.js" ></script>
	<script src="js/modernizr.js"></script>

	<link href="css/style.css" rel="stylesheet">
	<!--link rel="stylesheet" href="css/base.css" /-->
	<link rel="stylesheet" href="css/style2.css" />

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

<div class = "anunciosCont" >
	<div class = "anuncios" >
		<div id="effect-4">
				<div class="rowos clearfix">
		        	<?php
		        		$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
	  					$cuero = $mysqli -> query ("CALL s_noticia_si");	  					
	  					
			          	for ($jej = 0; $jej < 6; $jej ++) {	
			          		$valores = mysqli_fetch_array($cuero);

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
			            	echo '	<div class="unaNoti" >
										<a href="unaNoti.php?idNoti='.$idN.'">
										<figure>
								            <img src="'.$imagencita.'" alt="No imagen preview" class="imgAnun">	         
								            <figcaption>
									            <h2>'.$valores[1].'</h2>
									            <h4>'.$valores[2].'</h4>
									            <span>'.$valores[3].'</span>
									            <br>
									            <span>'.$valores[4].'</span>
									            <a href="#" class="close-caption hidden">x</a>
								             </figcaption>
								        </figure>
								        </a>
						        	</div>';				
			          	}
						$mysqli->close();
			        ?>

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
	<script src="js/scroll.js" ></script>
	<script src="js/menu.js" ></script>
	<script src="js/mostrar.js" ></script>
	<script src="js/verFecha.js" ></script>
</body>

</html>