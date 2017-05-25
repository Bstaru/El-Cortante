
function VerFotos(){

	var media = $("#uploadFile").val();
	var destino = 'media/' + media;

	console.log(destino)

	if (media!= '') {
		$( ".contFotos" ).append( $( "<img id='theImg' src='" + destino + "'/>" ) );
		//$(".formNewMed").submit();
	}
	else{
		alert('oie no');
	}
}


$(document).ready(function(){


	$("#okFotoN").click(VerFotos);


});

