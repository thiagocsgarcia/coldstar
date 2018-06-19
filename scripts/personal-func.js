$(document).ready(function() {


carregaTabela();

carregaInativos();

btnCancelarCadastro();

});




function capturarBiometria(){

    regist();

    if ($('#hidValorBiometria').val() != null && $('#hidValorBiometria').val() != ""){

        var biometria = $('#hidValorBiometria').val();

        var idPersonal = $('#codigo').val();

        $.ajax({
                method: "post",
                // url para o arquivo json.php
                url : "json/biometria.php",
                // dataType json
                dataType : "json",
                //parametros
                data : { opcao : "gravarBiometria",
                         idAluno : idPersonal,
                         biometria : biometria ,
                         status : 'personal'     
                },
                // função para de sucesso
                success : function(data){                       
                  
                   alert('Biometria Cadastrada com Sucesso');

                },//fim do success
                error : function(){
                    alert("Ocorreu um erro para gravar a biometria");
                }

            });
    }
    else {
        alert('Biometria não capturada');
    }

}





function buscaPersonalPorNome(nome){
    $.ajax({
                method: "post",
                // url para o arquivo json.php
                url : "json/personal-func.php",
                // dataType json
                dataType : "json",
                //parametros
                data : { opcao : "buscaPersonalPorNome",
                         nome : nome },
                // função para de sucesso
                success : function(data){

                    var html = "";

                            for($i=0; $i < data.length; $i++){


                                html += "<tr>";
                                html += "<td>" + data[$i].nome + "</td>";
                                html += "<td>" + data[$i].cpf + "</td>";
                                html += "<td>" + data[$i].rg + "</td>";
                                html += "<td>" + data[$i].nIns + "</td>"; 
                                html += "<td>" + data[$i].dataInicio + "</td>";
                                html += "<td>" + data[$i].status + "</td>";                            
                                html += "<td><a class='btn-sm btn-warning' role='button' onclick='btnNovoCadastro(); alterarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Editar </a></td>";                   
                                html += "<td><a class='btn-sm btn-danger'  role='button' onclick='deletarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Excluir </a></td>";  
                                html += "<td><a class='btn btn-sm btn-danger'  role='button' onclick='inativarFunc(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> inativar </a></td>";
                                html += "</tr>";

                              // alert(html); 
                            }
                        
                    $('#corpoTabela').html(html);


                }
                  
                 

            });
}

function salvarPersonal(id){

    


    var continua = true;

    if ($('#nomeCompleto').val().trim() == ""){
        $('#nomeCompleto').css('background-color','#FF6347');
        continua = false;
    }

    if ($('#cpf').val().trim() == "" ){
        $('#cpf').css('background-color','#FF6347');    
        continua = false;
    }

    if ($('#rg').val().trim() == ""){
        $('#rg').css('background-color','#FF6347');    
        continua = false;
    }
    
    //$('#email').css('background-color','');

    if ($('#dataNascimento').val().trim() == ""){
        $('#dataNascimento').css('background-color','#FF6347');
        continua = false;
    }

    //if ($('#dataExame').val().trim() == ""){
    //    $('#dataExame').css('background-color','#FF6347');
    //    continua = false;
    //}
    
    //$('#sexo').css('background-color','');

    if ($('#telefoneFixo').val().trim() == ""){
        $('#telefoneFixo').css('background-color','#FF6347');
        continua = false;
    }
        
    //$('#telefoneCelular').css('background-color','');

    if ($('#cep').val().trim() == ""){
        $('#cep').css('background-color','#FF6347');
        continua = false;
    }

    if ($('#endereco').val().trim() == ""){
        $('#endereco').css('background-color','#FF6347');
        continua = false;
    }

    if ($('#numero').val().trim() == ""){
        $('#numero').css('background-color','#FF6347');
        continua = false;
    }
    
    //$('#complemento').css('background-color','');
    
    if ($('#bairro').val().trim() == ""){
        $('#bairro').css('background-color','#FF6347');
        continua = false;
    }

    if ($('#cidade').val().trim() == ""){
        $('#cidade').css('background-color','#FF6347');
        continua = false;
    }

    if ($('#estado').val().trim() == ""){
        $('#estado').css('background-color','#FF6347');
        continua = false;
    }
    //$('#grupoEspecial').css('background-color','');
    //$('#grupoEspecial').css('background-color','');
    //$('#opcaoCadastral').css('background-color','');

    if (continua){



            $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/personal-func.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "cadastrar",
                             id : $("#codigo").val(), 

                             nomeCompleto : $("#nomeCompleto").val(),
                             cpf : $("#cpf").val(),
                             rg : $("#rg").val(),
                             email : $("#email").val(),
                             dataNascimento : $("#dataNascimento").val(),

                             cref : $("#cref").val(),
                             dataInicio : $("#dataInicio").val(),
                             carteiraTrabalho : $("#carteiraTrabalho").val(),
                             sexo : $("#sexo").val(),
                             cep : $("#cep").val(),

                             endereco : $("#endereco").val(),
                             numero : $("#numero").val(),
                             complemento : $("#complemento").val(),
                             bairro : $("#bairro").val(),

                             cidade : $("#cidade").val(),
                             estado : $("#estado").val(),
                             telefoneFixo : $("#telefoneFixo").val(),
                             telefoneCelular : $("#telefoneCelular").val(),
                             opcaoCadastral : $("#opcaoCadastral").val(),

                             login : $("#login").val(),
                             senha : $("#senha").val()                                                              
                    },
                    // função para de sucesso
                    success : function(data){                       
                      
                            alert("Personal/Funcionário Registrado !!");

                            carregaTabela();

                            limpar();   

                            $('#divCadastroFunc').hide('fold','500');
                            $('#btnNovoCadastro').show();                         

                    },//fim do success
                    error : function(){
                        alert("Erro ao inserir as informações, dados não alterados");
                    }

                });

    }
    else {
        alert('Preencha os campos destacados');
    }
                   
}



function alterarPersonal(id){

    if ($('#btnNovoCadastro').is(':visible')){
        $('#divCadastroFunc').show('fold','500');
        $('#btnNovoCadastro').hide();
    }

    $('#btnCadastrar').html('Salvar Alterações');
    
                 $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/personal-func.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "pesquisa",
                             id : id 
                    },
                    // função para de sucesso
                    success : function(data){      


                          for($i=0; $i < data.length; $i++){           
                      
                            //alert("Dados de >> "+ data[$i].nome + " << carregados para edição !!");

                            $("#codigo").val(data[$i].id);  
                            $('#hidIdPersonal').val(data[$i].id);                             
                            $("#nomeCompleto").val(data[$i].nome);

                            $("#cpf").val(data[$i].cpf);
                            $("#rg").val(data[$i].rg);
                            $("#email").val(data[$i].email);
                            $("#dataNascimento").val(data[$i].nasc);

                            $("#cref").val(data[$i].nIns);
                            $("#dataInicio").val(data[$i].dataInicio);
                            $("#carteiraTrabalho").val(data[$i].ct),
                            $("#sexo").val(data[$i].sexo);
                            $("#cep").val(data[$i].cep);

                            $("#endereco").val(data[$i].endereco);
                            $("#numero").val(data[$i].numero);
                            $("#complemento").val(data[$i].complemento);
                            $("#bairro").val(data[$i].bairro);

                            $("#cidade").val(data[$i].cidade);
                            $("#estado").val(data[$i].estado);
                            $("#telefoneFixo").val(data[$i].telefone);
                            $("#telefoneCelular").val(data[$i].celular);
                            $("#opcaoCadastral").val(data[$i].status); 

                            $("#login").val(data[$i].login);
                            $("#senha").val(data[$i].senha);

                            buscaFoto(data[$i].id);
                            
                            }                                
                               

                    },//fim do success
                    error : function(){
                        alert("Erro ao inserir as informações, dados não alterados");
                    }

                });



}

function buscaFoto(id){
    $.ajax({
            method: "post",
            // url para o arquivo json.php
            url : "json/personal-func.php",
            // dataType json
            dataType : "json",
            //parametros
            data : { opcao : "buscaFoto",
                     id : id       
            },
            // função para de sucesso
            success : function(data){                       
              
                for($i=0; $i < data.length; $i++){

                    //$("#imgAluno").attr("src", data[$i].foto);

                    /*
                    if (data[$i].local == "perfil-aluno")
                    {
                        document.getElementById('imgAluno').setAttribute( 'src', data[$i].foto );
                        document.getElementById('imgAluno').setAttribute( 'onclick', "window.open('" + data[$i].foto + "','Ratting','width=550,height=412,0,status=0,');" );

                    }
                    else if (data[$i].local == "antigo")
                    {
                        document.getElementById('imgAluno').setAttribute( 'src', 'data:image/jpg;base64, ' + data[$i].foto );
                        document.getElementById('imgAluno').setAttribute( 'onclick', "window.open('data:image/jpg;base64, " + data[$i].foto + "','Ratting','width=550,height=412,0,status=0,');" );    
                    }
                    */

                    document.getElementById('imgAluno').setAttribute( 'src', 'data:image/jpg;base64, ' + data[$i].foto );
                    document.getElementById('imgAluno').setAttribute( 'onclick', "window.open('data:image/jpg;base64, " + data[$i].foto + "','Ratting','width=550,height=412,0,status=0,');" );    
                    


                    
                }


                //if (data.foto != null) {
                //    var results = jQuery.parseJSON(data.foto);
                //    for (var key in results) {
                //        //the results is a base64 string.  convert it to an image and assign as 'src'
                //        document.getElementById("imgAluno").src = "data:image/png;base64," + results[key];
                //    }
                //}
                

            },//fim do success
            error : function(){
               // alert("Erro ao recuperar a imagem ... ");
            }

        });
}


function deletarPersonal(id){

                    $.ajax({
                    method: "post",
                    // url para o arquivo json.php
                    url : "json/personal-func.php",
                    // dataType json
                    dataType : "json",
                    //parametros
                    data : { opcao : "deletar",
                             id : id },
                    // função para de sucesso
                    success : function(data){                       
                      
                            alert("Registro deletado !!");

                            carregaTabela();

                            limpar();                                   

                    },//fim do success
                    error : function(){
                        alert("Erro ao inserir as informações, dados não alterados");
                    }


                });

} 



function carregaTabela(){

    $.ajax({
                method: "post",
                // url para o arquivo json.php
                url : "json/personal-func.php",
                // dataType json
                dataType : "json",
                //parametros
                data : { opcao : "listaGeral" },
                // função para de sucesso
                success : function(data){

                    var html = "";

                            for($i=0; $i < data.length; $i++){


                                html += "<tr>";
                                html += "<td>" + data[$i].nome + "</td>";
                                html += "<td>" + data[$i].cpf + "</td>";
                                html += "<td>" + data[$i].rg + "</td>";
                                html += "<td>" + data[$i].nIns + "</td>"; 
                                html += "<td>" + data[$i].dataInicio + "</td>";
                                html += "<td>" + data[$i].status + "</td>";                            
                                html += "<td><a class='btn btn-sm btn-warning' role='button' onclick='btnNovoCadastro(); alterarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Editar </a></td>";
                                html += "<td><a class='btn btn-sm btn-danger'  role='button' onclick='deletarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Excluir </a></td>";     
                                html += "<td><a class='btn btn-sm btn-danger'  role='button' onclick='inativarFunc(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> inativar </a></td>";
                                html += "</tr>";

                              // alert(html); 
                            }
                        
                    $('#corpoTabela').html(html);


                }
                  
                 

            });

}



function carregaInativos(){

    $.ajax({
                method: "post",
                // url para o arquivo json.php
                url : "json/personal-func.php",
                // dataType json
                dataType : "json",
                //parametros
                data : { opcao : "listaInativos" },
                // função para de sucesso
                success : function(data){

                    var html = "";

                            for($i=0; $i < data.length; $i++){

                                html += "<tr class='bg-danger'>";
                                html += "<td>" + data[$i].nome + "</td>";
                                html += "<td>" + data[$i].cpf + "</td>";
                                html += "<td>" + data[$i].rg + "</td>";
                                html += "<td>" + data[$i].nIns + "</td>"; 
                                html += "<td>" + data[$i].dataInicio + "</td>";
                                html += "<td>" + data[$i].status + "</td>";                            
                                html += "<td><a class='btn btn-sm btn-warning' role='button' onclick='btnNovoCadastro(); alterarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Editar </a></td>";
                                html += "<td><a class='btn btn-sm btn-danger'  role='button' onclick='deletarPersonal(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Excluir </a></td>";     
                                html += "<td><a class='btn btn-sm btn-success'  role='button' onclick='ativarFunc(" + data[$i].id + ")'><i class='mdi mdi-account-plus'></i> Ativar </a></td>";
                                html += "</tr>";

                              // alert(html); 
                            }
                        
                    $('#corpoInativos').html(html);

                }                                   

            });

}




function inativarFunc(id){    

        $.ajax({
             method: "post",
            // url para o arquivo json.php
            url : "json/personal-func.php",
            // dataType json
            dataType : "json",
            //parametros
            data : {id : id,
                    opcao : "inativarFuncionario",
                    inativo : "true" },

                success : function(data){


                        alert("Funcionário inativado !");


                    carregaTabela();

                    carregaInativos();


                },
                 error : function(){
                        alert("Erro ao inativar Funcionário. Favor contatar o Administrador.");
                }


            });


}



function ativarFunc(id){

        $.ajax({
             method: "post",
            // url para o arquivo json.php
            url : "json/personal-func.php",
            // dataType json
            dataType : "json",
            //parametros
            data : { id: id,
                    opcao : "inativarFuncionario",
                    inativo : "false"
                    },

                success : function(data){


                        alert("Funcionário Ativado !");


                    carregaTabela();

                    carregaInativos();


                },
                 error : function(){
                        alert("Erro ao inativar Funcionário. Favor contatar o Administrador.");
                }


            });


}





function btnNovoCadastro(){
    limpar();
    $('#divCadastroFunc').show('fold','500');
    $('#btnNovoCadastro').hide();
    $('#btnCadastrar').html('Efetivar Cadastro');

}

function btnCancelarCadastro(){
    limpar();
    $('#divCadastroFunc').hide('fold','500');
    $('#btnNovoCadastro').show();
    
}

function limpar(){

        $('#nomeCompleto').css('background-color','');
    $('#cpf').css('background-color','');
    $('#rg').css('background-color','');
    $('#email').css('background-color','');
    $('#dataNascimento').css('background-color','');
    $('#dataExame').css('background-color','');
    $('#sexo').css('background-color','');
    $('#telefoneFixo').css('background-color','');
    $('#telefoneCelular').css('background-color','');
    $('#cep').css('background-color','');
    $('#endereco').css('background-color','');
    $('#numero').css('background-color','');
    $('#complemento').css('background-color','');
    $('#bairro').css('background-color','');
    $('#cidade').css('background-color','');
    $('#estado').css('background-color','');
    //$('#grupoEspecial').css('background-color','');
    //$('#grupoEspecial').css('background-color','');
    $('#opcaoCadastral').css('background-color','');

        $("#codigo").val("");                             
        $("#nomeCompleto").val("");

        $("#cpf").val("");
        $("#rg").val("");
        $("#email").val("");
        $("#dataNascimento").val("");

        $("#cref").val("");
        $("#dataInicio").val("");
        $("#carteiraTrabalho").val(""),
        $("#sexo").val("");
        $("#cep").val("");

        $("#endereco").val("");
        $("#numero").val("");
        $("#complemento").val("");
        $("#bairro").val("");

        $("#cidade").val("");
        $("#estado").val("");
        $("#telefoneFixo").val("");
        $("#telefoneCelular").val("");
        $("#opcaoCadastral").val("");  
        $('#btnCadastrar').html('Efetivar Cadastro');

        $('#login').val("");
        $('#senha').val("");



}



function buscaCep(cep){
    
    if (cep.length == 9){

        var url = "http://viacep.com.br/ws/"+cep.replace("-","")+"/json/";

        $("#cep").val('');
        $("#endereco").val('');
        $("#bairro").val('');
        $("#cidade").val('');
        $("#estado").val('');
        
        $.ajax({
            // url para o arquivo json.php
            url : url,
            // dataType json
            dataType : "json",
            
            // função para de sucesso
            success : function(data){
                $("#cep").val(data.cep);
                $("#endereco").val(data.logradouro);
                $("#bairro").val(data.bairro);
                $("#cidade").val(data.localidade);
                $("#estado").val(data.uf);
                
            }
         });
    } else {
        $("#cep").val('');

    }
    

}