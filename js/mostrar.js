// jQuery


function ValidarLogin(){
    
      $(".correo").css ("border-color","#ffffff");
      $(".contra").css ("border-color","#ffffff");
      $(".flechita1").css ("display","none");
      $(".flechita2").css ("display","none");
      
      var correo= $(".correo").val();
      var contra = $(".contra").val();
      
      if((correo!="") && (contra != "")){         
      $(".formLog").submit();
      }
      else{
          if(correo==""){
              $(".correo").css ("border-color","#fc6a6a");
              $(".flechita1").css ("display","inline");
          }
           if(contra==""){
              $(".contra").css ("border-color","#fc6a6a");
               $(".flechita2").css ("display","inline");
          }
      }
}

$(document).ready(function(){
    $(".oksesion").click(ValidarLogin);

 /*login*/
    $('#login').on('click',function() {

        $('#sesionCont').slideDown();
    });

    $('#cancelsesion').on('click',function() {

      $(".correo").css ("border-color","#ffffff");
      $(".contra").css ("border-color","#ffffff");
      $(".flechita1").css ("display","none");
      $(".flechita2").css ("display","none");

      $(".correo").val('');
      $(".contra").val('');

        $('#sesionCont').slideUp();
    });
 

 /*comentarios*/
    $('#btnCo').on('click',function() {

        $('#comentario2').slideDown();
    });
 
    $('#ComentarNo').on('click',function() {

      $("#txtCo2").val('');

        $('#comentario2').slideUp();
    });


       $('#btnCo2').on('click',function() {

        $('#comentario3').slideDown();
    });
 
    $('#ComentarNo2').on('click',function() {

      $("#txtCo3").val('');

        $('#comentario3').slideUp();
    });
});


