
function ValidarRegistro(){
    
      $(".titulo").css ("border-color","#ffffff");
      $(".descp").css ("border-color","#ffffff");
      $(".cuerpo").css ("border-color","#ffffff");

      var titulo= $(".titulo").val();
      var descripcion = $(".descp").val();
      var cuerpo = $(".cuerpo").val();
      var seccion = $(".section").val();
      var usuario = $(".userNN").val();
      
      console.log (titulo,descripcion,cuerpo,usuario, seccion);

      if((titulo!="") && (descripcion != "") && (cuerpo != "")){         
        $(".formNN").submit();
      }
      else{
          if(name==""){
              $(".name").css ("border-color","#fc6a6a");
          }
           
      }
}


$(document).ready(function(){
    
    $(".oknewN").click(ValidarRegistro);
 
 
});
