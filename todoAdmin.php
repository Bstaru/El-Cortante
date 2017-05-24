
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

<div class="admonss2">
	<div class="contA2">
		<h1 style="text-align: center;">ADMINISTRACIÓN</h1>
		
		<table style="width: 100%; text-align: center; margin: 0 10px;">
			<tr>
				<td>
					<div class="joj">
						<a class = "btnGo" href="admin.php">APROBAR NOTICIAS</a>
					</div>
				</td>
				<td>
					<div class="joj">
						<a class = "btnGo" href="admin2.php">ELIMINAR USUARIOS</a>
					</div>
				</td>
				<td>
					<div class="joj">
						<a class = "btnGo" id = "nuevaSeccion" href="#">AGREGAR SECCIONES</a>
					</div>
				</td>
			</tr>
		</table>

		<div class="hacerSec" style="display: none;">
			<form action="php/regSec.php" class="formNewSec" name="formNewSec" method="POST">
				<h2>Nombre de la sección: </h2> 
				<input type = "text" name="nomSecNueva" class="nomSecNueva" placeholder="Nombre de la sección">
				<input type = "button" class = "oknewSec" value = "Aceptar">
			</form>
		</div>
		<script>
			$(document).ready(function(){

			    $('#nuevaSeccion').on('click',function() {
			        $('.hacerSec').slideDown();
			    });
			 
			    $('.oknewSec').on('click',function() {
			      var nombre= $(".nomSecNueva").val();
					if((nombre!="")){         
				       $(".formNewSec").submit();
				       $(".nomSecNueva").val('');
				       $('.hacerSec').slideUp();
				    }
				    else{
					    if(nombre==""){
					    	$(".nomSecNueva").css ("border-color","#fc6a6a");
					    }
			       	}
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