$(document).ready(function() {
 
        
carregarProdutos();
carregarFornecedores();
carregarCategoria();
    
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
                  html +=    "<td> <button class='btn btn-sm btn-warning'> Alterar </button> </td>"; 
                  html +=    "<td> <button class='btn btn-sm btn-danger'> Excluir </button> </td>";
                  html +=    "</tr>";



                }

                $('#tabelaProdutos').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Compras efetuadas. Contate o Administrador. ");
              }

          });    

}




function carregarFornecedores(){


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




function carregarCategoria(){


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





function carregarEdicao(idCategoria){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/categorias.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscaCategoriaId",
                       busca : idCategoria      
              },
              // função para de sucesso
              success : function(data){ 

                $('#txtId').val(data[0].id);
                $('#txtAbreviacao').val(data[0].codigoC);
                $('#txtdescricao').val(data[0].descricao);
                $('#txtId').val(data[0].id);
                $('#txtAbreviacao').val(data[0].codigoC);
                $('#txtdescricao').val(data[0].descricao);
                $('#txtId').val(data[0].id);
                $('#txtAbreviacao').val(data[0].codigoC);
                $('#txtdescricao').val(data[0].descricao);
                $('#txtId').val(data[0].id);
                $('#txtAbreviacao').val(data[0].codigoC);
                $('#txtdescricao').val(data[0].descricao);
                $('#txtId').val(data[0].id);
                $('#txtAbreviacao').val(data[0].codigoC);
                              

                

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}



function deletarProduto(idCategoria){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/categorias.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "deletarCategoria",
                       idCategoria : idCategoria     
              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro deletado com sucesso!');

                carregarCategorias();             

                

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
              url : "json/categorias.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "cadastrarCategoria",
                       idCategoria : $('#txtId').val(),
                       descricao : $('#txtdescricao').val(),
                       abreviacao : $('#txtAbreviacao').val()

              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro inserido com sucesso!');

                carregarCategorias();   

                $('#txtId').val('');
                $('#txtdescricao').val('');
                $('#txtAbreviacao').val('');          

                

              },//fim do success
              error : function(){
                  alert("Erro ao inserir registro. Contate o Administrador. ");
              }

          });    

}