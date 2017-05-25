<div class = "piedepagCont" >
	<div class = "piedepag">
		<section>
			<article>
					<ul>
					  <li  class = "tituloli">NOTICIAS</li>
					  <hr>
						 <?php
							$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
			  					$query = $mysqli -> query ("CALL s_seccion");	  					
			  					
					          	while ($valores = mysqli_fetch_array($query)) {	
					            	echo '<li><a href="noticias.php?idSec='.$valores[0].'">'.$valores[1].'</a></li>';				
					          	}
							$mysqli->close();
				        ?>
					</ul>
			</article>
			<article>
				<ul>
					  <li class = "tituloli">SIGUENOS</li>
					  <hr>
					  <li><a href="">Contáctanos</a></li>
					  <li class = "lilo"><a href="" class = "fb"></a></li>
					  <li class = "lilo"><a href="" class = "tt"></a></li>
					  <li class = "lilo"><a href="" class = "u2"></a></li>

					  <li style = "padding-left: 40px;">&copy 2017 EL CORTANTE</li>
					</ul>
			</article>				
		</section>	
	</div>
</div>