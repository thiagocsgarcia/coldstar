$(document).ready(function() {

	//$('#lblDia').html("Caixa: " + getToday());

  buscaDias();
});


function getToday(){

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	} 

	today = dd+'/'+mm+'/'+yyyy;
	return today;


}


function buscaDias()
{
	 $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/dias.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "listaDias" 
              },
              // função para de sucesso
              success : function(data){ 

              var html = '';  
              var forma = '';                   

                for($i=0; $i < data.length; $i++){
                  
                  html += '<tr>';
                  html +=  '<td>'+ data[$i].usuario.toUpperCase() +' </td>';
                  html +=  '<td>'+ data[$i].data +'</td>';
                  html +=  '<td><button class="btn btn-info btn-block btn-lg"> Imprimir </button></td>';
                  html +=  '<td><button class="btn btn-success btn-block btn-lg" onclick="alert(\'id: '+data[$i].id +' / codigo: '+ data[$i].codigo+' \')"> Ver </button></td>';
                  html += '</tr>';

                }

                $('#lblDia').html('Total de Dias: ' + data[0].totalDias);

                $('#bodyDias').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao recuperar a lista de dias no Banco de Dados.");
              }

          });
}


function calculaODia(Dia){

	

}




