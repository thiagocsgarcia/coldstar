$(document).ready(function() {
 
        
abreCompra();
    
});


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

                      alert('compra nº '+$('#hidCompra').val()+' foi aberta ...');              


                    },//fim do success
                    error : function(){
                        alert("Erro ao abrir compra. Contate o Administrador. ");
                    }

                });  

}


function atualizaListaCompras(){



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


                      for($i=0; $i < data.length; $i++){

                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' value='"+data[$i].valor+"'>";

                          html +=    "<td><input type='text' class='form-control' placeholder='Desconto' /></td>";

                          html +=    "<td><input type='text' class='form-control' id='txtTotal"+data[$i].id+"' value='"+data[$i].valor+"' placeholder='Total' /></td>";

                          html +=    "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button> </td>"; 

                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Excluir </button> </td>";
                          html +=    "</tr>";


                          totalAnterior += parseFloat(data[$i].valor);
                          

                      }

                      $('#total').html(totalAnterior);
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(html); 



                    },//fim do success
                    error : function(){
                        alert("Erro ao buscar registros. Contate o Administrador. ");
                    }

                });  




}





function registraProduto(){

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
                             codBarras : $('#txtCodigoBarras').val(),
                             idCompra : $('#hidCompra').val() 

                    },
                    // função para de sucesso
                    success : function(data){ 

                      var html = ''; 
                      var totalAnterior = 0 ;


                      for($i=0; $i < data.length; $i++){

                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' value='"+data[$i].valor+"'>";

                          html +=    "<td><input type='text' class='form-control' placeholder='Desconto' /></td>";

                          html +=    "<td><input type='text' class='form-control' name='txtTotalProduto' id='txtTotal"+data[$i].id+"' value='"+data[$i].valor+"' placeholder='Total' /></td>";

                          html +=    "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button> </td>"; 

                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Excluir </button> </td>";
                          html +=    "</tr>";


                          totalAnterior += parseFloat(data[$i].valor);
                          

                      }

                      $('#total').html(totalAnterior);
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(html); 



                    },//fim do success
                    error : function(){
                        alert("Erro ao buscar registros. Contate o Administrador. ");
                    }

                });  

            }    

}


function deletarProdutoCarrinho(idProduto){

  alert(idProduto);


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
                 var totalAnterior = 0;

                      for($i=0; $i < data.length; $i++){

                          html += "<input type='hidden' id='hidProdutoNaLista' value='"+data[$i].id+"'>";
                          html += "<tr'>";
                          html +=    "<td>"+data[$i].codigoPr+"</td>";

                          html +=    "<td><input type='text' class='form-control' id='txtQuantidade"+data[$i].id+"' value='"+data[$i].quantidade+"' onkeyup='atualizaQuantidadePreco("+data[$i].id+")' placeholder='Digite Qtde' /></td>";

                          html +=    "<td>"+data[$i].descricao+"</td>";

                          html +=    "<td>"+data[$i].valor+"</td>";
                          html += "<input type='hidden' id='txtValorUnitario"+data[$i].id+"' value='"+data[$i].valor+"'>";

                          html +=    "<td><input type='text' class='form-control' placeholder='Desconto' /></td>";

                          html +=    "<td><input type='text' class='form-control' name='txtTotalProduto' id='txtTotal"+data[$i].id+"' value='"+data[$i].valor+"' placeholder='Total' /></td>";

                          html +=    "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button> </td>"; 

                          html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProdutoCarrinho("+data[$i].id+")'> Excluir </button> </td>";
                          html +=    "</tr>";

                          totalAnterior = totalAnterior - parseFloat(data[$i].valor);

                      }

                      //alert(totalAnterior);

                      $('#total').html('R$ '+totalAnterior);

                      
                      
                      $('#txtCodigoBarras').val('');
                      $('#listaDeCompras').html(''); 
                      $('#listaDeCompras').html(html); 



                alert('Produto retirado da lista de compra!');

                


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
                             valorPago : $('#txtValorApagar').val()                                
                    },
                    // função para de sucesso
                    success : function(data){    

                    alert('pagou !!');                   

                     // setTimeout("atualizaListaCompras()", 2000);                                   


                    },//fim do success
                    error : function(){
                        alert("Erro ao atualizar quantidade. Contate o Administrador. ");
                    }

                });       


}



function fecharCompra(){

$('#subTotalCompra').html($('#total').html());
$('#totalCompra').html($('#total').html());


}














function limparCaixas(){


    $('#txtId').val('');
    $('#txtCodBarras').val('');
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