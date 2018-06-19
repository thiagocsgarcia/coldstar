$(document).ready(function() {
 
        
carregarCategorias();
    
});




function carregarCategorias(){


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
              var forma = '';                   

                for($i=0; $i < data.length; $i++){

                  html += "<tr>";
                  html +=     "<td>"+data[$i].id+"</td>";
                  html +=     "<td>"+data[$i].descricao+"</td>";
                  html +=     "<td>"+data[$i].codigoC+"</td>";
                  html +=     "<td>"+data[$i].dataCadastro+"</td>";
                  html +=     "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button>  <button class='btn btn-sm btn-danger' onclick='deletarCategoria("+data[$i].id+")'> Excluir </button> </td>";
                  html += "</tr>";



                }

                $('#tabelaCategorias').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Compras efetuadas. Contate o Administrador. ");
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

                

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}



function deletarCategoria(idCategoria){


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



function inserirCategoria(){


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