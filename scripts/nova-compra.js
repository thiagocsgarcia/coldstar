$(document).ready(function() {
 
        
abreCompra();

$('#txtCodigoBarras').focus();


    $('#btnFecharCompra').hide();
    $('#btnDescontoAluno').hide();
    $('#btnDescontoCompra').hide();

    $('#btnExcluiDescontoCompra').attr('disabled', 'false');


    
});



function somaTodosProdutos(){

        valor_array = document.getElementsByName('txtTotalProduto');
        var soma = 0;
        var quantItem = 0;
        for(var i = 0; i < valor_array.length; i++){
          soma += Number(valor_array[i].value); 
          quantItem += 1;
        }
        var soma2digitos = soma.toFixed(2);


        valor_arrayDescProd = document.getElementsByName('txtDescontoValor');
        var somaDescProd = 0;
        for(var i = 0; i < valor_arrayDescProd.length; i++){
          somaDescProd += Number(valor_arrayDescProd[i].value); 
        }        
        var descProd2digitos = somaDescProd.toFixed(2);



        valor_arrayProdSemDesc = document.getElementsByName('hidTotalProdutoSemDesconto');
        var somaProdSemDesc = 0;
        for(var i = 0; i < valor_arrayProdSemDesc.length; i++){
          somaProdSemDesc += Number(valor_arrayProdSemDesc[i].value);          
        }
        var somaProdSemDesc2digitos = somaProdSemDesc.toFixed(2);

        var valorApagar = soma2digitos - $('#descontoCompra').html();


        $('#subTotalCompra').html(somaProdSemDesc2digitos);

        $('#total').html(valorApagar);
        $('#totalApagar').html(valorApagar);
        $('#valorApagar').html(valorApagar);


        $('#descProd').html(descProd2digitos);
        $('#TotalDescontoProdutos').html(descProd2digitos);

        $( '#descComp').html($('#descontoCompra').html());
        $('#quantItem').html(quantItem);


        $('#txtCodigoOperacao').focus();




}




function abreCompra(){


      $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "novaCompra",
                             usuario : $('#hidUsuario').val()     
                    },
                    // função para de sucesso
                    success : function(data){ 
                      
                      $('#hidCompra').val(data[0].id); 

                      //alert('compra nº '+$('#hidCompra').val()+' foi aberta ...');     

                      $("#txtCodigoBarras").focus();         


                    },//fim do success
                    error : function(){
                        alert("Erro ao abrir compra. Contate o Administrador. ");
                    }

                });  

}




function carregaProdutosParaCompra(){

if ($("#txtCodigoBarras").val() == ''){

    $('#listaProdutosParaCompra').html(''); 


}else{

      $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "carregaProdutosParaCompra",
                             busca : $('#txtCodigoBarras').val()     
                    },
                    // função para de sucesso
                    success : function(data){ 


                      var html = '';   

                      for($i=0; $i < data.length; $i++){


                        html += "<tr class='bg-black-fosco'>";
                        html += "<td> <button class='btn btn-sm btn-success btn-block' onclick='registraProduto("+data[$i].codBarras+")'> Adicionar </button> </td>";
                          html += "<td> "+data[$i].codBarras+" </td>"  ;            
                          html += "<td> "+data[$i].descricao+" </td>";
                          html += "<td> R$ "+data[$i].preco+"</td>";
                          
                        html += "<</tr>";

                      }
                      
                      $('#listaProdutosParaCompra').html(html);  

                    },//fim do success
                    error : function(){
                        alert("Erro ao abrir compra. Contate o Administrador. ");
                    }

                });  
        }

}







/*function atualizaListaCompras(){



       $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "carregaListaDeCompras",                             
                             idCompra : $('#hidCompra').val() 

                    },
                    // função para de sucesso
                    success : function(data){ 

                      var html = ''; 
                      var totalAnterior = 0 ;
                      var calcularTotalProdutoSemDesconto = 0;


                      for($i=0; $i < data.length; $i++){
                         


                          if (data[$i].desconto != 0){

                            bloqueiaQuantidade = 'readonly';
                          
                          }else{

                            bloqueiaQuantidade = '';
                          }



                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' "+bloqueiaQuantidade+" /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' readonly value='"+data[$i].valor+"'>";

                          html +=    "<td><input id='txtDescontoPorcentagem"+data[$i].id+"' type='text' class='form-control' placeholder='Desconto(%)' onblur='descontoProduto("+data[$i].id+")' value='0' /> <input id='txtDescontoValor"+data[$i].id+"' name='txtDescontoValor' type='text' class='form-control' placeholder='Desconto($)' onblur='descontoProduto("+data[$i].id+")' value='"+data[$i].desconto+"' /> </td>";


                          calcularTotalProduto = data[$i].quantidade * data[$i].valor - data[$i].desconto;
                          html +=    "<td><input type='text' class='form-control' name='txtTotalProduto' id='txtTotal"+data[$i].id+"' value='"+calcularTotalProduto.toFixed(2)+"' placeholder='Total' readonly /></td>";


                          calcularTotalProdutoSemDesconto = data[$i].quantidade * data[$i].valor;
                          html += "<input type='hidden' id='TotalProdutoSemDesconto' value='"+calcularTotalProdutoSemDesconto+"'>";


                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Retirar </button> </td>";
                          html +=    "</tr>";


                          total += parseFloat(calcularTotalProduto);
                          

                      }

                      $('#total').html(total.toFixed(2));
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(html); 

                      
                      

                      $("#txtCodigoBarras").focus();

                       somaTodosProdutos();


                    },//fim do success
                    error : function(){
                        alert("Erro ao buscar registros. Contate o Administrador. ");
                    }

                });  




} */



function registraProduto(codigoDeBarras){

      if($('#textBuscaProduto').length = 13){

        //carregarProdutos();

      
        

               $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "registraProduto",
                             codBarras : codigoDeBarras,
                             idCompra : $('#hidCompra').val() 

                    },
                    // função para de sucesso
                    success : function(data){ 

                      var html = ''; 
                      var total = 0;
                      var calcularTotalProduto = 0;
                      var calcularTotalProdutoSemDesconto = 0;
                      var bloqueiaCaixas = '';

                      for($i=0; $i < data.length; $i++){




                          

                          if (data[$i].desconto != 0){

                            bloqueiaCaixas = 'readonly';
                          
                          }else{

                            bloqueiaCaixas = '';
                          }



                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' "+bloqueiaCaixas+" /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' readonly value='"+data[$i].valor+"'>";

                          html +=    "<td><input id='txtDescontoPorcentagem"+data[$i].id+"' type='text' class='form-control' placeholder='Desconto(%)' onblur='descontoProduto("+data[$i].id+")' value='0' "+bloqueiaCaixas+" /> <input id='txtDescontoValor"+data[$i].id+"' name='txtDescontoValor' type='text' class='form-control' placeholder='Desconto($)' onblur='descontoProduto("+data[$i].id+")' value='"+data[$i].desconto+"' "+bloqueiaCaixas+" /> </td>";


                          calcularTotalProduto = data[$i].quantidade * data[$i].valor - data[$i].desconto;

                          html +=    "<td><input type='text' class='form-control' name='txtTotalProduto' id='txtTotal"+data[$i].id+"' value='"+calcularTotalProduto.toFixed(2)+"' placeholder='Total' readonly /></td>";

                          calcularTotalProdutoSemDesconto = data[$i].quantidade * data[$i].valor;
                          html += "<input type='hidden' name='hidTotalProdutoSemDesconto' value='"+calcularTotalProdutoSemDesconto+"'>";

                          

                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Retirar </button> </td>";
                          html +=    "</tr>";


                          total += parseFloat(calcularTotalProduto);
                          

                      }

                      $('#listaProdutosParaCompra').html('');
                      

                      $('#total').html(total.toFixed(2));
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(html); 

                      $("#txtCodigoBarras").focus();

                       somaTodosProdutos();

                    },//fim do success
                    error : function(){
                        alert("Erro ao buscar registros. Contate o Administrador. ");
                    }

                });  

            }    



}


function deletarProdutoCarrinho(idProduto){

  //alert(idProduto);


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/compras.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "deletarProdutoCarrinho",
                       idProduto : idProduto,
                       idCompra : $('#hidCompra').val()     
              },
              // função para de sucesso
              success : function(data){ 


                    var html = ''; 
                    var total = 0;
                    var calcularTotalProduto = 0;
                    var calcularTotalProdutoSemDesconto = 0;
                    var bloqueiaCaixas = '';

                      for($i=0; $i < data.length; $i++){

                          

                          if (data[$i].desconto != 0){

                            bloqueiaCaixas = 'readonly';
                          
                          }else{

                            bloqueiaCaixas = '';
                          }



                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' "+bloqueiaCaixas+" /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' readonly value='"+data[$i].valor+"'>";

                          html +=    "<td><input id='txtDescontoPorcentagem"+data[$i].id+"' type='text' class='form-control' placeholder='Desconto(%)' onblur='descontoProduto("+data[$i].id+")' value='0' "+bloqueiaCaixas+" /> <input id='txtDescontoValor"+data[$i].id+"' name='txtDescontoValor' type='text' class='form-control' placeholder='Desconto($)' onblur='descontoProduto("+data[$i].id+")' value='"+data[$i].desconto+"' "+bloqueiaCaixas+" /> </td>";


                          calcularTotalProduto = data[$i].quantidade * data[$i].valor - data[$i].desconto;
                          html +=    "<td><input type='text' class='form-control' name='txtTotalProduto' id='txtTotal"+data[$i].id+"' value='"+calcularTotalProduto.toFixed(2)+"' placeholder='Total' readonly /></td>";


                          calcularTotalProdutoSemDesconto = data[$i].quantidade * data[$i].valor;
                          html += "<input type='hidden' name='hidTotalProdutoSemDesconto' value='"+calcularTotalProdutoSemDesconto+"'>";


                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Retirar </button> </td>";
                          html +=    "</tr>";


                          total += parseFloat(calcularTotalProduto);
                          

                      }

                      //alert(totalAnterior);


                      //atualizaListaCompras();
                      $('#total').html(total.toFixed(2));

                      
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(''); 
                      $('#listaDeCompras').html(html); 



                //alert('Produto retirado da lista de compra!');

                
                      somaTodosProdutos();

              },//fim do success
              error : function(){
                  alert("Erro ao deletar registro. Contate o Administrador. ");
              }

          });    

}




function atualizaQuantidadePreco(idProdutoCarrinho){

  var quantidade = $('#txtQuantidade'+idProdutoCarrinho).val();
  var valorUnitario = $('#txtValorUnitario'+idProdutoCarrinho).val(); 

  var total = valorUnitario * quantidade;

  $("#txtTotal"+idProdutoCarrinho).val(total);

  //var totalCompra = $('#total').val();

  //$('#total').html(totalCompra + total);
 
  valor_array = document.getElementsByName('txtTotalProduto');
    var soma = 0;
    for(var i = 0; i < valor_array.length; i++){
      soma += Number(valor_array[i].value); 
    }

  $('#total').html(soma);

      $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "atualizaQuantidadePreco",
                             idCompra : $('#hidCompra').val(),
                             idProduto : idProdutoCarrinho,
                             quantidade : quantidade,
                             valorTotal : total    
                    },
                    // função para de sucesso
                    success : function(data){                       

                     // setTimeout("atualizaListaCompras()", 2000);  

                     $('#total').html($('#total').html() - $('#descontoCompra').html());                                 


                    },//fim do success
                    error : function(){
                        alert("Erro ao atualizar quantidade. Contate o Administrador. ");
                    }

                });

}





function atualizaFormaPagamento(){


      $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "atualizaFormaPagto",
                             idCompra : $('#hidCompra').val(),
                             formaPagto : $('#slcFormaPagto').val(),
                             totalParcelas : $('#slcParcelas').val(),
                             vendedor : $('#hidUsuario').val(),
                             valorPago : $('#txtValorApagar').val()                                
                    },
                    // função para de sucesso
                    success : function(data){   

                    var html = '';
                    var totalPago = 0;

                    
                                                    
                      for($i=0; $i < data.length; $i++){


                          html += "<tr>";
                              html += "<td>"+data[$i].formaDesc+"</td>";
                              html += "<td>"+data[$i].tparcela+"</td>";
                              html += "<td> R$ "+data[$i].valor+"</td>";   
                              html += "<td> <button class='btn btn-xs btn-danger' onclick=''> cancelar </button> </td>";                           
                          html += "</tr>";

                          totalPago += parseFloat(data[$i].valor);

                          //alert(totalPago);


                      }

                    $('#tabelaPagamentosRegistrados').html(html);

                    var totalCompra = parseFloat($('#total').html());

                    var totalAbatido = totalCompra - totalPago;

                    var comDoisDigitos = totalAbatido.toFixed(2);

                    if(totalAbatido < 0){

                      $('#totalLabel').html('Troco:R$');
                      $('#valorApagar').html( Math.abs(comDoisDigitos));

                    }else{

                      $('#valorApagar').html(comDoisDigitos);

                    }

                    $('#txtValorApagar').val('');
                    $('#txtValorApagar').attr('disabled','disabled');
                    $('#btnAdicionaPagto').attr('disabled','disabled');
                    $('#txtCodigoOperacao').val('');
                    $('#txtCodigoOperacao').focus();

                    },//fim do success
                    error : function(){
                        alert("Erro ao atualizar quantidade. Contate o Administrador. ");
                    }

                });       


}




function finalizarCompra(){

var calculaTroco = 0;

     if($('#totalLabel').html() == 'Troco:R$'){

                      calculaTroco = $('#valorApagar').html();

                    }else{

                      calculaTroco = 0;

                    }

   

    $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "FinalizaCompra",
                             idCompra : $('#hidCompra').val(),
                             descontoCompra : $('#descontoCompra').html(),
                             troco : calculaTroco,
                             quantidadeItens : $('#quantItem').html(),
                             valorTotalCompra : $('#total').html(),
                             usuario : $('#hidUsuario').val()                                                           
                    },
                    // função para de sucesso
                    success : function(data){    

                    alert('Compra Finalizada ... ');  

                    location.href="http://localhost/loja/principal.php?acao=principal";                    


                    },//fim do success
                    error : function(){
                        alert("Erro ao Finalizar a compra. Contate o Administrador. ");
                    }

                });  



}


function descontoProduto(idProduto){

    var totalProduto = $('#txtTotal'+idProduto).val();
    var descontoProduto = $('#txtDescontoValor'+idProduto).val();
    var descontoProdutoPorcentagem = $('#txtDescontoPorcentagem'+idProduto).val();
    var quantidade = $('#txtQuantidade'+idProduto).val();
    var valorUnitario = $('#txtValorUnitario'+idProduto).val();
    var descontoFinal = '';

    
        if( $('#txtDescontoPorcentagem'+idProduto).val() == 0 ){

          //$('#txtDescontoValor'+idProduto).val(0);

            var diferenca = valorUnitario * quantidade - descontoProduto;

            var diferenca2digitos = diferenca.toFixed(2);

            //alert(diferenca2digitos);

            $('#txtTotal'+idProduto).val(diferenca2digitos);


              if ( $('#txtDescontoValor'+idProduto).val() != 0 ){

                  $('#txtQuantidade'+idProduto).attr('disabled','disabled');
                  $('#txtDescontoValor'+idProduto).attr('disabled','disabled');
                  $('#txtDescontoPorcentagem'+idProduto).attr('disabled','disabled');

              }

            

            descontoFinal = descontoProduto;

            


        }else{

            var valorPercentual = descontoProdutoPorcentagem / 100;

            var descontoFinal2 = (valorUnitario * quantidade) * valorPercentual;

            var descontoComDuasCasas = descontoFinal2.toFixed(2);


            $('#txtDescontoValor'+idProduto).val(descontoComDuasCasas);


              var diferenca = valorUnitario * quantidade - descontoFinal2;

              var comDuasCasas = diferenca.toFixed(2);

              $('#txtTotal'+idProduto).val(comDuasCasas);

              
              $('#txtQuantidade'+idProduto).attr('disabled','disabled');
              $('#txtDescontoValor'+idProduto).attr('disabled','disabled');
              $('#txtDescontoPorcentagem'+idProduto).attr('disabled','disabled');

              

              descontoFinal = descontoFinal2;

             


        }


            $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "atualizaDescontoPreco",
                             idCompra : $('#hidCompra').val(),
                             idProduto : idProduto,
                             quantidade : quantidade,
                             desconto : descontoFinal,
                             valorTotal : $('#txtTotal'+idProduto).val()    
                    },
                    // função para de sucesso
                    success : function(data){                       

                     // setTimeout("atualizaListaCompras()", 2000);  

                      somaTodosProdutos();   

                      $('#txtCodigoBarras').focus();


                    },//fim do success
                    error : function(){
                        alert("Erro ao inserir desconto. Contate o Administrador. ");
                    }

                });


        
           
  

}





function calcularDescontoCompra(porcentagem){

  if(porcentagem == 'sim'){

      var porcentagem = parseFloat($('#txtDescontoPorcentagem').val())/100;

      //alert(porcentagem);

      var calcularTotalComPorcentagem = parseFloat($('#total').html()) * porcentagem;

      $('#descontoCompra').html(calcularTotalComPorcentagem.toFixed(2));

      $('#total').html( parseFloat($('#total').html()) - calcularTotalComPorcentagem );

  }

    /*$.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/compras.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "calculaDescontoCompra",
                             idCompra : $('#hidCompra').val(),
                             descontoCompra : $('#descontoCompra').html()                               
                    },
                    // função para de sucesso
                    success : function(data){    

                        $('#descontoCompra').html(data[0].desconto);                         


                    },//fim do success
                    error : function(){
                        alert("Erro ao atualizar quantidade. Contate o Administrador. ");
                    }

                }); */


    $('#btnDescontoCompra').hide();
    $('#btnExcluiDescontoCompra').removeAttr('disabled');

}



function excluirDescontoCompras(){


    $('#total').html( parseFloat($('#total').html()) + parseFloat($('#descontoCompra').html()) );


    $('#descontoCompra').html('0.00');

    $('#btnDescontoCompra').show();

    $('#btnExcluiDescontoCompra').attr('disabled', 'false');


}





function encerrarPedidos(){


    excluirDescontoCompras();



    if($('#btnEncerrarPedidos').html() == 'Encerrar Pedidos'){

        $('#btnFecharCompra').show();
        $('#btnDescontoAluno').show();
        $('#btnDescontoCompra').show();
        $('#btnEncerrarPedidos').html('Voltar a Comprar');

        $('#txtCodigoBarras').attr('disabled', 'disabled');
        $('input:radio[name="txtDescontoValor"]').attr('disabled', 'disabled');

    }else{

        $('#btnFecharCompra').hide();
        $('#btnDescontoAluno').hide();
        $('#btnDescontoCompra').hide();
        $('#btnEncerrarPedidos').html('Encerrar Pedidos');

        $('#txtCodigoBarras').removeAttr('disabled');
        $('txtDescontoValor').removeAttr('disabled');
        $('#txtCodigoBarras').focus();

    }

}




function defineFormaPagto() {

  if($('#txtCodigoOperacao').val() == ''){

    $('#slcParcelas').hide();
    $('#txtValorApagar').attr('disabled','disabled');
    $('#btnAdicionaPagto').attr('disabled','disabled');
    $('slcParcelas').hide();

  }else{
    
    $('#btnAdicionaPagto').removeAttr('disabled');

    $('#txtValorApagar').removeAttr('disabled');
    $('#txtValorApagar').focus();


  }


      switch($('#txtCodigoOperacao').val()){

        case '1':
            $('#slcFormaPagto').val('av');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;


        case '2':
            $('#slcFormaPagto').val('md');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();
            

            break;

        case '3':
            $('#slcFormaPagto').val('vd');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;

        
        case '4':
            $('#slcFormaPagto').val('ed');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;

        
        case '5':
            $('#slcFormaPagto').val('mc');
            $('#slcParcelas').show();

            break;

        
        case '6':
            $('#slcFormaPagto').val('vc');
            $('#slcParcelas').show();

            break;

        
        case '7':
            $('#slcFormaPagto').val('tr');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;


        case '8':
            $('#slcFormaPagto').val('ar');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;


        case '9':
            $('#slcFormaPagto').val('sd');
            $('#slcParcelas').val('1');
            $('#slcParcelas').hide();

            break;

      }


}




function limparCaixas(){


    $('#txtId').val('');
    $('#txtCodigoBarras').val('');
    $('#txtDescricao').val('');
    $('#slcCategoria').val('');
    $('#slcFornecedor').val('');            
    $('#txtCustoi').val('');
    $('#txtEstoque').val('');
    $('#txtCustof').val('');
    //$('#txtPorcentagem').val(data[0].id);
    $('#txtPreco').val('');
    $('#txtCtrib').val('');
    $('#txtNcm').val('');

}