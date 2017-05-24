			function buscar(){
				$(".buscarAlgo").css ("border-color","#ffffff");

				var busqueda = $(".buscarAlgo").val();
				console.log(busqueda);

			   	if((busqueda!="") ){         
			        $(".buscarCont").submit();
				}
				else{
				    if(busqueda==""){
				        $(".buscarAlgo").css ("border-color","#fc6a6a");
				    }
				}
			}  		

  		$(document).ready(function(){
			$(".buscarOk").click(buscar);
		});
