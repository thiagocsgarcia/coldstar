$(document).ready(function() {
	//$("#btnCadastrarConta").click(function(){
	//});

	//$("#hidCodigo").val();

        if ($('#hidIdAluno').val() != ""){
            buscaAluno($('#hidIdAluno').val());
        }

        carregaGrupos();

    
        

    
});

function verificaEmail(email){

    $('#email').css('background-color','');
    $('#hidEmailCadastrado').val('0');

    if (email != ""){

         $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/cadastra-alunos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "verificaEmail",
                       email : email.toUpperCase()      
              },
              // função para de sucesso
              success : function(data){                       

                if(data[0].quantidade > 0){
                    $('#email').css('background-color','#FF6347');
                    $('#hidEmailCadastrado').val('1');
                    alert('Email já cadastrado, \nFavor insira outro email.');
                }

              },//fim do success
              error : function(){
                  alert("Erro ao ativar matricula. Contate o Administrador. ");
              }

          });

    }

}


function verificaIdade(nascimento){
    if (nascimento != ""){

        var temp = nascimento.split("/");

        var dateNascimento = new Date(temp[1]+"/"+temp[0]+"/"+temp[2]);
        var hoje = new Date();

        var anoNascimento = dateNascimento.getFullYear();
        var anoAtual = hoje.getFullYear();

        var diferenca =  dateDiferencaEmDias(dateNascimento, hoje);

        diferenca = diferenca / 365;

        //alert(Number(diferenca).toFixed(1));

        if (diferenca < 18){
            $('#divMenorIdade').show('slidedown');
        }
        else {
            $('#divMenorIdade').hide('slidedown');
        }



    }
}


function atualizaStatusAtivar(id){

    $.ajax({
              method: "post",
              // url para o arquivo json.php
              url : "json/cadastra-alunos.php",
              // dataType json
              dataType : "json",
              //parametros
              data : { opcao : "atualizaStatusAtivar",
                       id : id       
              },
              // função para de sucesso
              success : function(data){                       
                
                for($i=0; $i < data.length; $i++){

                  //$("#imgAluno").attr("src", data[$i].foto);

                  //alert("aluno ativado !!");

                }

              },//fim do success
              error : function(){
                  alert("Erro ao ativar matricula. Contate o Administrador. ");
              }

          });


}






function carregaGrupos(){

        $.ajax({
            method: "post",
            // url para o arquivo json.php
            url : "json/cadastra-alunos.php",
            // dataType json
            dataType : "json",
            //parametros
            data : { opcao : "carregaGrupos" },
            // função para de sucesso
            success : function(data){                       
              
                
                var html = "<option selected value='0'>Selecione o grupo especial</option>";
                // executo este laço para ecessar os itens do objeto javaScript
                for($i=0; $i < data.length; $i++){
                    
                    html += "<option value='"+data[$i].id+"'>"+data[$i].descricao+"</option>";
                    

                }//fim do laço
                
                               
                $('#opcoesGrupo').html(html);
                

            },//fim do success
            error : function(){
                alert("Erro ao inserir as informações, dados não alterados");
            }

        });

}



function liberaOpcaoGrupo(){


        if ($('#grupoEspecial').val() == "S"){

             $("#opcoesGrupo").removeAttr('disabled');
        }

        if ($('#grupoEspecial').val() == "N"){

             $("#opcoesGrupo").attr("disabled","disabled");
             $("#opcoesGrupo").val('');
        }




}




function buscaAluno(id){

        $.ajax({
            method: "post",
            // url para o arquivo json.php
            url : "json/perfil-aluno.php",
            // dataType json
            dataType : "json",
            //parametros
            data : { opcao : "buscaAlunoPorId",
                     id : id       
            },
            // função para de sucesso
            success : function(data){                       
              
                
                
                // executo este laço para ecessar os itens do objeto javaScript
                for($i=0; $i < data.length; $i++){
                    
					//var status = data[$i].status == "ativo" ? "aluno" : data[$i].status;
					
                    $("#nomeCompleto").val(data[$i].nome);
                    $("#cpf").val(data[$i].cpf);
                    $("#rg").val(data[$i].rg);
                    $("#dataNascimento").val(data[$i].nasc);
                    $("#email").val(data[$i].email);
                    $("#dataExame").val(data[$i].exame);
                    $("#sexo").val(data[$i].sexo);
                    $("#telefoneFixo").val(data[$i].telefone);
                    $("#telefoneCelular").val(data[$i].celular);
                    $("#cep").val(data[$i].cep);
                    $("#endereco").val(data[$i].endereco);
                    $("#numero").val(data[$i].numero);
                    $("#complemento").val(data[$i].complemento);
                    $("#bairro").val(data[$i].bairro);
                    $("#cidade").val(data[$i].cidade);
                    $("#estado").val(data[$i].estado);
                    $("#grupoEspecial").val(data[$i].grupoE);
                    $("#opcaoCadastral").val(data[$i].status);

                    switch(data[$i].statusCadastro)
                    {
                        case 'pre-cadastro':
                            $('#btnCadastrar').show();
                            $('#btnSalvar').hide();
                            break;
                        case 'ativo':
                            $('#btnCadastrar').hide();
                            $('#btnSalvar').show();
                            break;
                        case 'passo1':
                            $('#btnCadastrar').show();
                            $('#btnSalvar').hide();
                            break;
                        case 'passo2':
                            $('#btnCadastrar').show();
                            $('#btnSalvar').hide();
                            break;
                        case 'passo3':
                            $('#btnCadastrar').show();
                            $('#btnSalvar').hide();
                            break;
                        case 'passo4':
                            $('#btnCadastrar').show();
                            $('#btnSalvar').hide();
                            break;
                        case 'cancelado':
                            $('#btnCadastrar').hide();
                            $('#btnSalvar').show();
                            break;
                    }
                        
                    
                    

                }//fim do laço
                
                
                
                

            },//fim do success
            error : function(){
                //alert("Erro ao inserir as informações, dados não alterados");
            }

        });

}



function atualizarFuncionario(){
    $('#nomeCompleto').css('background-color','');
    $('#cpf').css('background-color','');
    $('#rg').css('background-color','');
    $('#email').css('background-color','');
    $('#dataNascimento').css('background-color','');
    $('#dataExame').css('background-color','');
    $('#sexo').css('background-color','');
    //$('#telefoneFixo').css('background-color','');
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

    //if ($('#telefoneFixo').val().trim() == ""){
    //    $('#telefoneFixo').css('background-color','#FF6347');
    //    continua = false;
    //}
        
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
        var id              = $('#hidIdAluno').val();
        var nomeCompleto    = $("#nomeCompleto").val();
        var cpf             = $("#cpf").val();
        var rg              = $("#rg").val();
        var dataNascimento  = $("#dataNascimento").val();
        var email           = $("#email").val();
        var dataExame       = $("#dataExame").val();
        var sexo            = $("#sexo").val();
        var telefoneFixo    = $("#telefoneFixo").val();
        var telefoneCelular = $("#telefoneCelular").val();
        var cep             = $("#cep").val();
        var endereco        = $("#endereco").val();
        var numero          = $("#numero").val();
        var complemento     = $("#complemento").val();
        var bairro          = $("#bairro").val();
        var cidade          = $("#cidade").val();
        var estado          = $("#estado").val();
        var grupoEspecial   = $("#grupoEspecial").val();
        var opcoesGrupo     = $('#opcoesGrupo').val();
        var opcaoCadastral  = $("#opcaoCadastral").val();
        var qualGrupo       = $('#opcoesGrupo').val();


        $.ajax({
            method: "post",
            // url para o arquivo json.php
            url : "json/perfil-aluno.php",
            // dataType json
            //dataType : "json",
            //parametros
            data : { opcao : "atualizaAluno",
                    id : id,
                    nomeCompleto : nomeCompleto,
                    cpf : cpf,
                    rg : rg,
                    dataNascimento : dataNascimento,
                    email : email,
                    dataExame : dataExame,
                    sexo : sexo,
                    telefoneFixo : telefoneFixo,
                    telefoneCelular : telefoneCelular,
                    cep : cep,
                    endereco : endereco,
                    numero : numero,
                    complemento : complemento,
                    bairro : bairro,
                    cidade : cidade,
                    estado : estado,
                    grupoEspecial : grupoEspecial,
                    opcoesGrupo : opcoesGrupo,
                    opcaoCadastral : opcaoCadastral,
                    qualGrupo : qualGrupo
            },
            // função para de sucesso
            success : function(){                       
                //alert('Dados Alterados');


                document.location.href = '/time4fit/principal.php?acao=perfil-aluno&id='+id+'&codigoBio=null';
                                       

            },//fim do success
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro!");
                //alert("Erro ao inserir as informações, dados não alterados");
                //for(i in XMLHttpRequest) {
                //    if(i!="channel") document.write(i +" : " + XMLHttpRequest[i] +"<br>")
                //}
            }
        });//alert('Continua');
    }
    else {
        alert('favor preencher os campos em vermelho');
        return;
    }
}


function enviarInfo(){
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


    var continua = true;

    if ($('#nomeCompleto').val().trim() == ""){
        $('#nomeCompleto').css('background-color','#FF6347');
        continua = false;
    }

    if($('#hidEmailCadastrado').val() == '1'){
        $('#email').css('background-color','#FF6347');
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


    if ($('#dataNascimento').val() != ""){
        var nascimento = $('#dataNascimento').val();
        var temp = nascimento.split("/");

        var dateNascimento = new Date(temp[1]+"/"+temp[0]+"/"+temp[2]);
        var hoje = new Date();

        var anoNascimento = dateNascimento.getFullYear();
        var anoAtual = hoje.getFullYear();

        var diferenca =  dateDiferencaEmDias(dateNascimento, hoje);

        diferenca = diferenca / 365;

        //alert(Number(diferenca).toFixed(1));

        if (diferenca < 18){
            
            if ($('#nomeFiliacao').val() == ""){
                $('#nomeFiliacao').css('background-color','#FF6347');
                continua = false;
            }

            if ($('#cpfFiliacao').val() == ""){
                $('#cpfFiliacao').css('background-color','#FF6347');
                continua = false;
            }

        }
        



    }
    //$('#grupoEspecial').css('background-color','');
    //$('#grupoEspecial').css('background-color','');
    //$('#opcaoCadastral').css('background-color','');

    
    /*var dateTemp = $("#dataExame").val().split("/");
    var dtExame = new Date(dateTemp[1]+"/"+dateTemp[0]+"/"+dateTemp[2]);
    
    dateTemp = $("#dataNascimento").val().split("/");
    var dataNascimento = new Date(dateTemp[1]+"/"+dateTemp[0]+"/"+dateTemp[2]);*/
    

    if (continua){

        var nomeCompleto    = $("#nomeCompleto").val().toUpperCase();
        var cpf             = $("#cpf").val();
        var rg              = $("#rg").val();
        var dataNascimento  = $('#dataNascimento').val();
        var email           = $("#email").val().toUpperCase();
        var dataExame       = $('#dataExame').val();
        var sexo            = $("#sexo").val();
        var telefoneFixo    = $("#telefoneFixo").val();
        var telefoneCelular = $("#telefoneCelular").val();
        var cep             = $("#cep").val();
        var endereco        = $("#endereco").val().toUpperCase();
        var numero          = $("#numero").val();
        var complemento     = $("#complemento").val().toUpperCase();
        var bairro          = $("#bairro").val().toUpperCase();
        var cidade          = $("#cidade").val().toUpperCase();
        var estado          = $("#estado").val().toUpperCase();
        var grupoEspecial   = $("#grupoEspecial").val();
        var opcoesGrupo     = $('#opcoesGrupo').val();
        var opcaoCadastral  = $("#opcaoCadastral").val();
        var nomeFiliacao    = $('#nomeFiliacao').val() == "" ? null : $('#nomeFiliacao').val();
        var cpfFiliacao     = $('#cpfFiliacao').val() == "" ? null : $('#cpfFiliacao').val();

        //if (opcaoCadastral == "aluno") //opcaoCadastral = "pre-cadastro";

        var temp = dataNascimento.split("/");
        dataNascimento = temp[1] + "/" + temp[0] + "/" + temp[2];

        temp = dataExame.split("/");
        dataExame = temp[1] + "/" + temp[0] + "/" + temp[2];

        var hoje = new Date();

        var mes = ("0" + (hoje.getMonth() + 1)).slice(-2);
        var dia = ("0" + hoje.getDate()).slice(-2);
        var ano = hoje.getFullYear();

        var dtInicio = mes + '/' + dia + '/' + ano; 

        $.ajax({
            method: "post",
            // url para o arquivo json.php
            url : "json/select-alunos.php",
            // dataType json
            dataType : "json",
            //parametros
            data : { opcao : "insertAluno",
                     nomeCompleto : nomeCompleto,
                     cpf : cpf,
                     rg : rg,
                     dataNascimento : dataNascimento,
                     email : email,
                     dataExame : dataExame,
                     sexo : sexo,
                     telefoneFixo : telefoneFixo,
                     telefoneCelular : telefoneCelular,
                     cep : cep,
                     endereco : endereco,
                     numero : numero,
                     complemento : complemento,
                     bairro : bairro,
                     cidade : cidade,
                     estado : estado,
                     grupoEspecial : grupoEspecial,
                     opcoesGrupo : opcoesGrupo,
                     opcaoCadastral : opcaoCadastral,
                     status : "passo1",
                     dtInicio : dtInicio,
                     nomeFiliacao : nomeFiliacao,
                     cpfFiliacao : cpfFiliacao
            },
            // função para de sucesso
            success : function(data){                       
                //alert('teste');
               document.location.href = '/time4fit/principal.php?acao=cadastra-aluno2&rg=' + rg + '&id=' + data[0].id + '&opcaoCadastral='+opcaoCadastral+'&grupoPertencente='+ opcoesGrupo;
                                       

            },//fim do success
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro!");
                //alert("Erro ao inserir as informações, dados não alterados");
                //for(i in XMLHttpRequest) {
                //    if(i!="channel") document.write(i +" : " + XMLHttpRequest[i] +"<br>")
                //}
            }
        });//alert('Continua');
    }
    else {
        alert('favor preencher os campos em vermelho');
        return;
    }



}


function txtCpf(cpf){
    

    $('#cpf').css('background-color','');

    if (cpf != ""){
        if(!validarCPF(cpf)){
            $('#cpf').css('background-color','#FF6347');
        }
    }

    
}
/*
function validarCPF(cpf) {  
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true;   
}
*/
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