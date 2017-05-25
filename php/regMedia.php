	 <?php

	 $file = $_FILES["imgNnoti"];         
     $name_file = time().".jpg";

     $tmp_name = $file['tmp_name'];
     $local = "../media/";
         
     move_uploaded_file($tmp_name, $local.$name_file);
         
     $ruta = "../media/".$name_file;

     echo ($ruta);


?>
