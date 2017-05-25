
function ValidarRegistro(){
    
      $(".titulo").css ("border-color","#ffffff");
      $(".descp").css ("border-color","#ffffff");
      $(".cuerpo").css ("border-color","#ffffff");

      var titulo= $(".titulo").val();
      var descripcion = $(".descp").val();
      var cuerpo = $(".cuerpo").val();
      var seccion = $(".section").val();
      var usuario = $(".userNN").val();
      var laimg = $(".upload2").val();
      
      console.log (titulo,descripcion,cuerpo,usuario, seccion);

      if((titulo!="") && (descripcion != "") && (cuerpo != "") && (laimg != "")){         
        $(".formNN").submit();
      }
      else{
          if(name==""){
             alert('INSERTA TODOS LOS DATOS POR FAVOR');
          }
           
      }
}


$(document).ready(function(){
    
    $(".oknewN").click(ValidarRegistro);
 
 
});
