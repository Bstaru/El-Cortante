function VerFotos(){

	var media;
	var url;

	media = $("#uploadBtn").val();

	if (media!= '') {
		$( ".contFotos" ).append( $( "<img id='theImg' src='" + media + "'/>" ) );
		//$(".formNewMed").submit();
	}
	else{
		alert('oie no');
	}
}


$(document).ready(function(){


	$("#okFotoN").click(VerFotos);


});

