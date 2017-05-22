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

function ValidarRegistro(){
    
      $(".name").css ("border-color","#ffffff");
      $(".1lastname").css ("border-color","#ffffff");
      $(".2lastname").css ("border-color","#ffffff");
      $(".tel").css ("border-color","#ffffff");
      $(".op").css ("border-color","#ffffff");
      $(".birth").css ("border-color","#ffffff");
      $(".mail").css ("border-color","#ffffff");
      $(".contraa").css ("border-color","#ffffff");

      $(".flechita3").css ("display","none");
      $(".flechita4").css ("display","none");
      $(".flechita5").css ("display","none");
      $(".flechita6").css ("display","none");
      $(".flechita7").css ("display","none");
      $(".flechita8").css ("display","none");
      $(".flechita9").css ("display","none");
      $(".flechita10").css ("display","none");

      var name= $(".name").val();
      var last1 = $(".1lastname").val();
      var last2 = $(".2lastname").val();
      var tel= $(".tel").val();
      var type= $(".op").val();
      var bday= $(".birth").val();
      var mail= $(".mail").val();
      var pass= $(".contraa").val();
      
      console.log (name,last1,last2,tel,type,bday,mail,pass);

      if((name!="") && (last1 != "") && (last2 != "")&& (tel != "")
      && (type != "")&& (bday != "") && (mail != "") && (pass != "") ){         
        $(".formNew").submit();
      }
      else{
          if(name==""){
              $(".name").css ("border-color","#fc6a6a");
              $(".flechita3").css ("display","inline");
          }
           if(last1==""){
              $(".1lastname").css ("border-color","#fc6a6a");
               $(".flechita4").css ("display","inline");
          }
           if(last2==""){
              $(".2lastname").css ("border-color","#fc6a6a");
               $(".flechita5").css ("display","inline");
          }
           if(tel==""){
              $(".tel").css ("border-color","#fc6a6a");
               $(".flechita6").css ("display","inline");
          }
           if(type==""){
              $(".op").css ("border-color","#fc6a6a");
               $(".flechita7").css ("display","inline");
          }
           if(bday==""){
              $(".birth").css ("border-color","#fc6a6a");
               $(".flechita8").css ("display","inline");
          }
           if(mail==""){
              $(".mail").css ("border-color","#fc6a6a");
               $(".flechita9").css ("display","inline");
          }
           if(pass==""){
              $(".contraa").css ("border-color","#fc6a6a");
               $(".flechita10").css ("display","inline");
          }
      }
}

function ValidarEditar(){
    
      $(".name").css ("border-color","#ffffff");
      $(".1lastname").css ("border-color","#ffffff");
      $(".2lastname").css ("border-color","#ffffff");
      $(".tel").css ("border-color","#ffffff");
      $(".op").css ("border-color","#ffffff");
      $(".birth").css ("border-color","#ffffff");
      $(".mail").css ("border-color","#ffffff");
      //$(".contraa").css ("border-color","#ffffff");

      $(".flechita3").css ("display","none");
      $(".flechita4").css ("display","none");
      $(".flechita5").css ("display","none");
      $(".flechita6").css ("display","none");
      $(".flechita7").css ("display","none");
      $(".flechita8").css ("display","none");
      $(".flechita9").css ("display","none");
      //$(".flechita10").css ("display","none");

      var name= $(".name").val();
      var last1 = $(".1lastname").val();
      var last2 = $(".2lastname").val();
      var tel= $(".tel").val();
      var type= $(".op").val();
      var bday= $(".birth").val();
      var mail= $(".mail").val();
      var pass= $(".contraa").val();

      
      console.log (name,last1,last2,tel,type,bday,mail,pass);

      if((name!="") && (last1 != "") && (last2 != "")&& (tel != "")
      && (type != "")&& (bday != "") && (mail != "") ){         
        $(".formEdit").submit();
      }
      else{
          if(name==""){
              $(".name").css ("border-color","#fc6a6a");
              $(".flechita3").css ("display","inline");
          }
           if(last1==""){
              $(".1lastname").css ("border-color","#fc6a6a");
               $(".flechita4").css ("display","inline");
          }
           if(last2==""){
              $(".2lastname").css ("border-color","#fc6a6a");
               $(".flechita5").css ("display","inline");
          }
           if(tel==""){
              $(".tel").css ("border-color","#fc6a6a");
               $(".flechita6").css ("display","inline");
          }
           if(type==""){
              $(".op").css ("border-color","#fc6a6a");
               $(".flechita7").css ("display","inline");
          }
           if(bday==""){
              $(".birth").css ("border-color","#fc6a6a");
               $(".flechita8").css ("display","inline");
          }
           if(mail==""){
              $(".mail").css ("border-color","#fc6a6a");
               $(".flechita9").css ("display","inline");
          }
          /* if(pass==""){
              $(".contraa").css ("border-color","#fc6a6a");
               $(".flechita10").css ("display","inline");
          }*/
      }
}
$(document).ready(function(){
    $(".oksesion").click(ValidarLogin);
    
    $(".oknew").click(ValidarRegistro);

     $(".okedit").click(ValidarEditar);
     
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
 
});

