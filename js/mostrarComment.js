
$(document).ready(function(){

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
