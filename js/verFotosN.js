function VerFotos(){

	var media;
	var url;

	media = $("#uploadBtn").val();

	if (media!= '') {
		console.log(media);
		$( ".contFotos" ).append( $( "<img id='theImg' src='" + media + "'/>" ) );
	}
	else{
		alert('oie no');
	}
}


$(document).ready(function(){


	$("#okFotoN").click(VerFotos);


});

