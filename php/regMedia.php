	 <?php
$mysqli = new mysqli("localhost", "root", "shineekey91", "elcortante") or die('Error');
session_start();

if(!empty($_POST))
{
	$file = $_FILES["imgNnoti"];         
     $name_file = time().".jpg";
     $tmp_name = $file['tmp_name'];
     $local = "../media/";
         
     move_uploaded_file($tmp_name, $local.$name_file);
         
     $ruta = "../media/".$name_file;

     echo ($ruta);
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../new.php");
	}

	
$mysqli->close();	
	 

?>
