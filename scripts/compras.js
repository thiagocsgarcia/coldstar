$(document).ready(function() {
 
        
carregaCompras();
    
});




function carregaCompras(){



         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/compras.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "carregaCompras"      
              },
              // função para de sucesso
              success : function(data){ 

              var html = '';  
              var forma = '';                   

                for($i=0; $i < data.length; $i++){

                	forma = '';

                	switch(data[$i].forma){
                		case 'md':
                			forma = 'Master Débito';
                		break;

                		case 'mc':
                			forma = 'Master Débito';
                		break;

                		case 'vd':
                			forma = 'Visa Débito';
                		break;

                		case 'vc':
                			forma = 'Visa Débito';
                		break;

                		case 'ed':
                			forma = 'Elo Débito';
                		break;

                		case 'ec':
                			forma = 'Elo Débito';
                		break;

                		case 'av':
                			forma = 'à Vista';
                		break;

                		case 'm':
                			forma = 'm';
                		break;

                		case 'sd':
                			forma = 'sodex';
                		break;

                		case 'tr':
                			forma = 'Ticket Refeição';
                		break;

                	}




                html += "<div class='col-md-2' align='center' style='border: 1px solid #888;border-radius:3px;'>";

				html +=		"<h4 class='bg-black-fosco'> ID - "+  data[$i].id +"</h4>";

				html +=		"<h6>"+ data[$i].data +"</h6>";

				html +=		"<h5>"+ forma +"</h5>";

				html +=		"<h3 class='vermelho-laranja'> R$ "+ data[$i].valor +"</h3>";

				html +=		"<button class='btn btn-xs btn-success btn-block'> Imprimir </button>";
				html +=		"<button class='btn btn-xs btn-danger btn-block'> Excluir </button>";

				html +=		"<br />";

				html +=		"</div>";

                }

                $('#divCompras').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Compras efetuadas. Contate o Administrador. ");
              }

          });

    

}