$(document).ready(function() {

	$('#lblDia').html("Caixa: " + getToday());
  buscaDia();

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


function buscaDia()
{
	 $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fechamento-caixa.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscarDia" ,
                     hoje  : "22/05/2015"
              },
              // função para de sucesso
              success : function(data){ 

                 if ( data.length > 0) {
                    buscarCompras(data[0].codigo);
                    buscaSangria(data[0].codigo);
                 }
                 else {
                  alert("Dia atual não foi iniciado");
                 }
                

              },//fim do success
              error : function(){
                  alert("Erro ao recuperar o Dia atual no Banco de Dados.");
              }

          });
}


function buscarCompras(codigoDia)
{


   $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fechamento-caixa.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscarComprasPorCodigoDia" ,
                     codigoDia  : codigoDia
              },
              // função para de sucesso
              success : function(data){ 

/*-----------------------------------------------------------------------------------------------------------------------
                var arrQtd = {'bl':0,'ch':0,'cc':0,'da':0, 'cd':0};
                var arrTotalPago = {'bl':0,'ch':0,'cc':0,'da':0,'cd':0};
                var arrTotalPendente = {'bl':0,'ch':0,'cc':0,'da':0,'cd':0};
                var arrValorPago = {'bl':0.0,'ch':0.0,'cc':0.0,'da':0.0, 'cd':0.0};
                var arrValorPendente = {'bl':0.0,'ch':0.0,'cc':0.0,'da':0.0,'cd':0.0};
                var arrTaxa = {'bl':0.0,'ch':0.0,'cc':0.0,'da':0.0,'cd':0.0};

                var taxaBoleto = 0;
                var taxaCartao = 0;

                var arrValorTotal = {'bl':0.0,'ch':0.0,'cc':0.0,'da':0.0,'cd':0.0};

                var arrTotal = {'total':0.0,'totalPago':0.0,'totalPendente':0.0,'totalTaxa':0.0, 'qtdTotal': 0.0};
//-----------------------------------------------------------------------------------------------------------------------*/
                

                var arrFormas = ["av","ed","m","mc","md","sd","tr","vc","vd"];

                var arrValorTotal = {'av':0.0,'ed':0.0,'m':0.0,'mc':0.0,'md':0.0,'sd':0.0,'tr':0.0,'vc':0.0,'vd':0.0};

                var arrTotalFinalizado = {'av':0,'ed':0,'m':0,'mc':0,'md':0,'sd':0,'tr':0,'vc':0,'vd':0};
                var arrValorTotalFinalizado = {'av':0.0,'ed':0.0,'m':0.0,'mc':0.0,'md':0.0,'sd':0.0,'tr':0.0,'vc':0.0,'vd':0.0};

                var arrQtd = {'av':0,'ed':0,'m':0,'mc':0,'md':0,'sd':0,'tr':0,'vc':0,'vd':0};
                var arrDesconto = {'desconto':0.0, 'descontoAluno':0.0, 'descontoProduto':0.0};


                for($i=0; $i < data.length; $i++){      

                  
                  //quantidade de boletos por forma de pagamento
                  arrQtd[data[$i].forma]++;

                  //valor total de cada forma de pagamento independente se esta pago ou nao
                  arrValorTotal[data[$i].forma] = arrValorTotal[data[$i].forma] + parseFloat(data[$i].valor);
                  
                  if (data[$i].status == 'finalizado')
                  {
                    //quantidade de boletos pagos por forma de pagamento
                    arrTotalFinalizado[data[$i].forma]++;

                    //somatorio do valor dos boletos pagos por forma de pagamento
                    arrValorTotalFinalizado[data[$i].forma] =  arrValorTotalFinalizado[data[$i].forma] + parseFloat(data[$i].valor);
                  }
                  else if (data[$i].status == 'pendente')
                  {
                    //quantidade de boletos pendentes por forma de pagamento
                    arrTotalPendente[data[$i].forma]++;

                    //somatorio do valor dos boletos pendentes por forma de pagamento
                    arrValorPendente[data[$i].forma] =  arrValorPendente[data[$i].forma] + parseFloat(data[$i].valor);
                  } 

                }


                for($i=0; $i < arrFormas.length; $i++){

                    $('#td_'+ arrFormas[$i]).html('R$ ' + arrValorTotal[arrFormas[$i]]);

                }


                

              },//fim do success
              error : function(){
                  alert("Erro ao recuperar o Dia atual no Banco de Dados.");
              }

          });

}

function buscaSangria(codigoDia){
    $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fechamento-caixa.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscarSangriasPorCodigoDia" ,
                     codigoDia  : codigoDia
              },
              // função para de sucesso
              success : function(data){ 

                var valor = 0.0;
                var html = "";
                var cont = 0;

                for($i=0; $i < data.length; $i++){      

                  valor = parseFloat(data[$i].valor) + parseFloat(data[$i].valor);
                  
                  html+='<tr>';
                  html+='<td> '+ data[$i].descricao +' </td>';
                  html+='<td> R$ ' + data[$i].valor + ' </td>';
                  html+='<td> '+ data[$i].data +' </td>';
                  html+='</tr>';
                  cont++;

                }

                if (cont == 0){
                  html = '<tr><td class="bg-danger" colspan="3" style="font-size: xx-large; margin-botom:2em;" align="center">Não há Sangria</td></tr>';
                }
                
                $('#bodySangria').html(html);
                $('#td_sangria').html('R$ '+ valor);
                

              },//fim do success
              error : function(){
                  alert("Erro ao recuperar a Sangria do Dia atual no Banco de Dados.");
              }

          });

}


