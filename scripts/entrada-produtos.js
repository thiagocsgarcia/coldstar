$(document).ready(function() {
 
        
//carregarProdutos();
carregarSlcFornecedores();
carregarSlcCategoria();
    
});




function carregarProdutos(){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/produtos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "carregarProdutos"      
              },
              // função para de sucesso
              success : function(data){ 

              var html = '';  
              var forma = '';                   

                for($i=0; $i < data.length; $i++){

                  html += "<tr>";
                  html +=    "<td>"+data[$i].codBarras+"</td>";
                  html +=    "<td>"+data[$i].descricao+"</td>";
                  html +=    "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button> </td>"; 
                  html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProduto("+data[$i].id+")'> Excluir </button> </td>";
                  html +=    "</tr>";

                  $('#totalProdutos').html($i + 1);

                }

                $('#tabelaProdutos').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Compras efetuadas. Contate o Administrador. ");
              }

          });    

}







function pesquisarProduto(){




      if($('#textBuscaProduto').length < 1){

        //carregarProdutos();

        $('#tabelaProdutos').html('');

      }else{


               $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/produtos.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "buscaProdutosNome",
                             busca : $('#textBuscaProduto').val()     
                    },
                    // função para de sucesso
                    success : function(data){ 

                      var html = ''; 

                      for($i=0; $i < data.length; $i++){

                        html += "<tr>";
                        html +=    "<td>"+data[$i].codBarras+"</td>";
                        html +=    "<td>"+data[$i].descricao+"</td>";
                        html +=    "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Carregar </button> </td>"; 
                        html +=    "<td> <button class='btn btn-sm btn-danger' onclick='deletarProduto("+data[$i].id+")'> Excluir </button> </td>";
                        html +=    "</tr>";

                        $('#totalProdutos').html($i + 1);

                      }


                      $('#tabelaProdutos').html('');
                      $('#tabelaProdutos').html(html);               


                    },//fim do success
                    error : function(){
                        alert("Erro ao buscar registros. Contate o Administrador. ");
                    }

                });  

            }    

}






function carregarSlcFornecedores(){

         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fornecedores.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "carregarFornecedor"
              },
              // função para de sucesso
              success : function(data){ 

                var html = '';

                html += "<option value=''></option>";

                for ($i=0; $i < data.length; $i++) {

                  html += "<option value='"+data[$i].id+"'>"+data[$i].nFantasia+"</option>";               
                                 
                }; 

                $('#slcFornecedor').html(html);                

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}




function carregarImpostosFornecedores(){

         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fornecedores.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscaFornecedorId",
                       busca : $('#slcFornecedor').val(),
              },
              // função para de sucesso
              success : function(data){ 

                var html = '';                

                for ($i=0; $i < data.length; $i++) {

                  $('#txtIcms').val(data[$i].icms);
                  $('#txtSt').val(data[$i].st); 
                  $('#txtIpi').val(data[$i].ipi);           
                                 
                }; 
               
                calculaCustoFinal();

              },//fim do success
              error : function(){
                alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });   

}




function calculaCustoFinal(){

  var icms = parseFloat($('#txtIcms').val())/ 100;
  var st =  parseFloat($('#txtSt').val()) / 100; 
  var ipi = parseFloat($('#txtIpi').val()) / 100; 

  var custoFinal = 0;
  var custoInicial = parseFloat($('#txtCustoi').val());


  if ($('#txtIcms').val() > 0){
    custoInicial += parseFloat($('#txtCustoi').val()) * icms;
  }

  if ($('#txtSt').val() > 0){
    custoInicial += parseFloat($('#txtCustoi').val()) * st;
  }

  if ($('#txtIpi').val() > 0){
    custoInicial += parseFloat($('#txtCustoi').val()) * ipi;
  }

  $('#txtCustof').val(custoInicial.toFixed(2).replace(".",","));

}




function calculaPreco(){

  var porcentagem = parseFloat($('#txtPorcentagem').val()) / 100;


  var custoFinal = parseFloat($('#txtCustof').val());
  
 
  if ($('#txtPorcentagem').val() > 0){
    custoFinal += parseFloat($('#txtCustof').val()) * porcentagem;
  }

  
  $('#txtPreco').val(custoFinal.toFixed(2).replace(".",","));


}




function carregarSlcCategoria(){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/categorias.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "carregarCategoria"
              },
              // função para de sucesso
              success : function(data){ 

                var html = '';

                html += "<option value=''></option>";

                for ($i=0; $i < data.length; $i++) {

                  html += "<option value='"+data[$i].id+"'>"+data[$i].descricao+"</option>";
                                 
                }; 

                $('#slcCategoria').html(html);
                

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}




function carregarEdicao(idProduto){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/produtos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscaProdutosId",
                       busca : idProduto     
              },
              // função para de sucesso
              success : function(data){ 

                $('#txtId').val(data[0].id);
                $('#txtCodBarras').val(data[0].codBarras);
                $('#txtDescricao').val(data[0].descricao);
                $('#slcCategoria').val(data[0].categoria);
                $('#slcFornecedor').val(data[0].fornecedor);            
                $('#txtCustoi').val(data[0].custoI);
                $('#txtEstoque').val(data[0].estoque);
                $('#txtCustof').val(data[0].custo);
                //$('#txtPorcentagem').val(data[0].id);
                $('#txtPreco').val(data[0].preco);
                $('#txtCtrib').val(data[0].ct);
                $('#txtNcm').val(data[0].ncm);


                carregarImpostosFornecedores();

                $('#tabelaProdutos').html('');

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}



function deletarProduto(idProduto){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/produtos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "deletarProdutos",
                       idProduto : idProduto     
              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro deletado com sucesso!');

                carregarProdutos(); 


              },//fim do success
              error : function(){
                  alert("Erro ao deletar registro. Contate o Administrador. ");
              }

          });    

}



function inserirProduto(){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/produtos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "cadastrarProdutos",
                       id : $('#txtId').val(),
                       codBarras : $('#txtCodBarras').val(),
                       descricao : $('#txtDescricao').val(),
                       categoria : $('#slcCategoria').val(),
                       fornecedor: $('#slcFornecedor').val(),            
                       custoI : $('#txtCustoi').val(),
                       estoque : $('#txtEstoque').val(),
                       custoF : $('#txtCustof').val(),
                        //$('#txtPorcentagem').val(data[0].id);
                       preco : $('#txtPreco').val(),
                       ct : $('#txtCtrib').val(),
                       ncm : $('#txtNcm').val()

              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro inserido com sucesso!');

                carregarProdutos();

                 

                $('#txtId').val('');
                $('#txtdescricao').val('');
                $('#txtAbreviacao').val('');          

                

              },//fim do success
              error : function(){
                  alert("Erro ao inserir registro. Contate o Administrador. ");
              }

          });    

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