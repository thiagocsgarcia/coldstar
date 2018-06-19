$(document).ready(function() {
 
        
carregarFornecedores();
    
});




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
              var forma = '';                   

                for($i=0; $i < data.length; $i++){

                  html += "<tr>";
                  html +=     "<td>"+data[$i].cnpj+"</td>";
                  html +=     "<td>"+data[$i].nFantasia+"</td>";                 
                  html +=     "<td> <button class='btn btn-sm btn-warning' onclick='carregarEdicao("+data[$i].id+")'> Alterar </button> </td>";
                  html +=     "<td> <button class='btn btn-sm btn-danger' onclick='deletarFornecedor("+data[$i].id+")'> Excluir </button> </td>";

                  html += "</tr>";

                  $('#totalFornecedores').html($i + 1);

                }

                $('#tabelaFornecedores').html(html);

              },//fim do success
              error : function(){
                  alert("Erro ao carregar lista de Fornecedores. Contate o Administrador. ");
              }

          });    

}



function carregarEdicao(idCategoria){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fornecedores.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "buscaFornecedorId",
                       busca : idCategoria      
              },
              // função para de sucesso
              success : function(data){ 

                $('#txtId').val(data[0].id);
                $('#txtCpf').val(data[0].cpf);
                $('#txtRg').val(data[0].rg);
                $('#txtCnpj').val(data[0].cnpj);
                $('#txtInscricaoEstadual').val(data[0].insE);
                $('#txtTipoC').val(data[0].tipoC);
                $('#txtRazaoSocial').val(data[0].rSocial);
                $('#txtNomeFantasia').val(data[0].nfantasia);
                $('#txtEndereco').val(data[0].endereco);
                $('#txtNumero').val(data[0].numero);
                $('#txtComplemento').val(data[0].complemento);
                $('#txtCep').val(data[0].cep);
                $('#txtBairro').val(data[0].bairro);
                $('#txtCidade').val(data[0].cidade);
                $('#txtUf').val(data[0].estado);

                $('#txtEmail').val(data[0].email);
                $('#txtContato').val(data[0].contato);
                $('#txtTelefoneFixo').val(data[0].telefone);
                $('#txtCelular').val(data[0].celular);
                $('#txtOutros').val(data[0].outros);
                $('#txtSite').val(data[0].site);
                $('#txtSt').val(data[0].st);
                $('#txtIpi').val(data[0].ipi);
                $('#txtIcms').val(data[0].icms);



                

              },//fim do success
              error : function(){
                  alert("Erro ao carregar Dados para edição. Contate o Administrador. ");
              }

          });    

}



function deletarFornecedor(idFornecedor){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fornecedores.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "deletarFornecedor",
                       idFornecedor : idFornecedor     
              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro deletado com sucesso!');

                carregarFornecedores();             

                

              },//fim do success
              error : function(){
                  alert("Erro ao deletar registro. Contate o Administrador. ");
              }

          });    

}



function inserirFornecedor(){


         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/fornecedores.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "cadastrarFornecedor",
                       idFornecedor: $('#txtId').val(),
                       cpf: $('#txtCpf').val(),
                       rg: $('#txtRg').val(),
                       cnpj: $('#txtCnpj').val(),
                       insE: $('#txtInscricaoEstadual').val(),
                       tipoC :$('#txtTipoC').val(),
                       rSocial: $('#txtRazaoSocial').val(),
                       nfantasia: $('#txtNomeFantasia').val(),
                       endereco: $('#txtEndereco').val(),
                       numero: $('#txtNumero').val(),
                       complemento: $('#txtComplemento').val(),
                       cep: $('#txtCep').val(),
                       bairro: $('#txtBairro').val(),
                       cidade: $('#txtCidade').val(),
                       estado: $('#txtUf').val(),

                       email: $('#txtEmail').val(),
                       contato: $('#txtContato').val(),
                       telefone: $('#txtTelefoneFixo').val(),
                       celular: $('#txtCelular').val(),
                       outros: $('#txtOutros').val(),
                       site: $('#txtSite').val(),
                       st: $('#txtSt').val(),
                       ipi: $('#txtIpi').val(),
                       icms: $('#txtIcms').val()

              },
              // função para de sucesso
              success : function(data){ 

                alert('Registro inserido com sucesso!');

                carregarFornecedores();   

                $('#txtId').val('');
                $('#txtCpf').val('');
                $('#txtRg').val('');
                $('#txtCnpj').val('');
                $('#txtInscricaoEstadual').val('');
                $('#txtTipoC').val('');
                $('#txtRazaoSocial').val('');
                $('#txtNomeFantasia').val('');
                $('#txtEndereco').val('');
                $('#txtNumero').val('');
                $('#txtComplemento').val('');
                $('#txtCep').val('');
                $('#txtBairro').val('');
                $('#txtCidade').val('');
                $('#txtUf').val('');

                $('#txtEmail').val('');
                $('#txtContato').val('');
                $('#txtTelefoneFixo').val('');
                $('#txtCelular').val('');
                $('#txtOutros').val('');
                $('#txtSite').val('');
                $('#txtSt').val('');
                $('#txtIpi').val('');
                $('#txtIcms').val('');        

                

              },//fim do success
              error : function(){
                  alert("Erro ao inserir registro. Contate o Administrador. ");
              }

          });    

}




function limparCaixas(){


      $('#txtId').val('');
      $('#txtCpf').val('');
      $('#txtRg').val('');
      $('#txtCnpj').val('');
      $('#txtInscricaoEstadual').val('');
      $('#txtTipoC').val('');
      $('#txtRazaoSocial').val('');
      $('#txtNomeFantasia').val('');
      $('#txtEndereco').val('');
      $('#txtNumero').val('');
      $('#txtComplemento').val('');
      $('#txtCep').val('');
      $('#txtBairro').val('');
      $('#txtCidade').val('');
      $('#txtUf').val('');

      $('#txtEmail').val('');
      $('#txtContato').val('');
      $('#txtTelefoneFixo').val('');
      $('#txtCelular').val('');
      $('#txtOutros').val('');
      $('#txtSite').val('');
      $('#txtSt').val('');
      $('#txtIpi').val('');
      $('#txtIcms').val(''); 

}