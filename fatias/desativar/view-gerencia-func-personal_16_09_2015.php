<div class="col-md-12" id="divCadastroFunc">
      <script src="scripts/personal-func.js"></script>


      <ul class="breadcrumb">
              <li><a href="principal.php?acao=principal"> Home </a></li>        
              <li class="active"> Gerenciar Funcionários </li>
      </ul>

      <div id="divBiometria">
    <input type="hidden" id="hidValorBiometria" />
    <object classid="CLSID:F66B9251-67CA-4d78-90A3-28C2BFAE89BF" height=0 width=0 id="objNBioBSP" name="objNBioBSP"></object>

               <script lang='javascript'>
               
                    var err, payload;
                    var result = false;
                    DEVICE_AUTO_DETECT  = 255;
                    var objNBioBSP = new ActiveXObject('NBioBSPCOM.NBioBSP.1');
                    var objDevice = objNBioBSP.Device;
                    var objExtraction = objNBioBSP.Extraction;
                    var objMatching = objNBioBSP.Matching;
                    var objIndexSearch = objNBioBSP.IndexSearch;
                    var n = 0;
                    var nUserID;



                    function regist()
                    {

                      try // Exception handling
                      {
                        objDevice.Open(DEVICE_AUTO_DETECT);
                        err = objDevice.ErrorCode;  // Get error code
                        if ( err != 0 )   // Device open failed
                        {
                          alert('Falha ao abrir leitor biométrico');
                        }
                        else
                        {
                          //objExtraction.Enroll(payload);
                          objExtraction.Enroll(nUserID, 0);

                          err = objExtraction.ErrorCode;  // Get error code
                          if ( err != 0 )   // Enroll failed
                          {
                            alert('Registration failed ! Error Number : [' + err + ']');
                          }
                          else  // Enroll success
                          {
                                objIndexSearch.AddFIR(objExtraction.TextEncodeFIR, nUserID);
                                alert('Digital capturada com sucesso!');
                                
                                /*
                                result = true;
                                var codC = $('input[name="codC"]').val();
                              var action = 'sistema/gerenciar_personal.php';
                            var buscar = $.post(action,{opc : '1',codigo : codC,digital : (objExtraction.TextEncodeFIR)});
                                buscar.done(valor);
                                function valor(result){
                                    document.location.href="painel.php?exe=gerenciar/biometria&c="+codC;            
                                }
                                */

                              $('#hidValorBiometria').val(objExtraction.TextEncodeFIR);


                          }
                          objDevice.Close(DEVICE_AUTO_DETECT);
                        }
                        }
                      catch(e)
                      {
                        alert(e.message);
                        return(false);
                      }
                      if ( result )
                      {
                        // Submit main form

                        //document.MainForm.submit();
                      }
                      return result;

                    }
                    
                </script>  
    </div>

      <h3 class="alert-info"> CADASTRAR FUNCIONÁRIO </h3>

      <!--form action="bd/cadastra-aluno.php" method="post"-->

    <div class=" col-md-12 bg-cinza-claro">     


      <div class="col-md-6" align="left">   
            <h3 class="bg-cinza-prata"> DADOS CADASTRAIS </h3>  

                   <div class="form-group">
                          <label for="codigo">Código</label>
                          <input type="text" class="form-control" id="codigo" name="codigo" placeholder=" ... " readonly>
                      </div>    

                      <div class="form-group">
                          <label for="nomeCompleto">Nome Completo</label>
                          <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite nome completo">
                      </div>

                      <div class="form-group">
                          <label for="CPF">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" onkeyup="mascara(this, mcpf);" maxlength="14"  onblur="txtCpf($(this).val())" placeholder="Digite CPF (apenas números)">
                      </div>


                      <div class="form-group">
                          <label for="RG">RG</label>
                          <input type="text" class="form-control" id="rg" name="rg" onkeyup="mascara(this, mrg);" maxlength="14" placeholder="Digite RG (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="exemplo - jane.doe@example.com">
                      </div>

                      <div class="form-group">
                          <label for="dataNascimento">Data de Nascimento</label>
                          <input type="text" class="form-control data" id="dataNascimento" name="dataNascimento" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data de Nascimento (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="cref">CREF</label>
                          <input type="text" class="form-control" id="cref" name="cref" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="apenas números">
                      </div>

                       <div class="form-group">
                          <label for="dataInicio">Data Inicio</label>
                          <input type="text" class="form-control data" id="dataInicio" name="dataInicio" onkeyup="mascara(this, mdata);" maxlength="14" placeholder="Data (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="carteiraTrabalho">Carteira de Trabalho</label>
                          <input type="text" class="form-control" id="carteiraTrabalho" name="carteiraTrabalho" maxlength="14" placeholder="(apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="sexo">Sexo</label>
                          <select size="1" class='form-control' name="sexo" id="sexo">
                              <option selected value="F">Feminino</option>
                              <option value="M">Masculino</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="login">Login</label>
                          <input type="text" class="form-control" id="login" name="login" maxlength="14" placeholder="Insira o Login">
                      </div>

                      <div class="form-group">
                          <label for="senha">Senha</label>
                          <input type="password" class="form-control" id="senha" name="senha" maxlength="14" placeholder="digite a senha">
                      </div>
                      
                
        </div>

        <div class="col-md-6" align="left">
        <h3 class="bg-cinza-prata"> ENDEREÇO </h3>  

                      <div class="form-group">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control" id="cep" name="cep" onblur="buscaCep($(this).val())" onkeyup="mascara(this, mcep);" maxlength="9" placeholder="Digite CEP (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="endereco">Endereço</label>
                          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite endereco">
                      </div>


                      <div class="form-group">
                          <label for="numero">Número</label>
                          <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite Número">
                          </div>

                      <div class="form-group">                   
                          <label for="complemento">Complemento</label>
                          <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite informações Adicionais">
                      </div>

                      <div class="form-group">
                          <label for="bairro">Bairro</label>
                          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro">
                      </div>

                      <div class="form-group">
                          <label for="cidade">Cidade</label>
                          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a Cidade">
                      </div>

                      <div class="form-group">
                          <label for="estado">UF</label>
                          <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o Estado">
                      </div>


                      <div class="form-group">
                          <label for="telefoneFixo">Telefone Fixo</label>
                          <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" onkeyup="mascara(this, mtel);" maxlength="14" placeholder="Telefone Fixo (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="telefoneCelular">Telefone Celular</label>
                          <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" onkeyup="mascara(this, mtel);" maxlength="15" placeholder="Celular (apenas números)">
                      </div>

                      
                      <div class="form-group">
                          <label for="opcaoCadastral">Opção de Cadastro</label>
                          <select size="1" class='form-control' name="opcaoCadastral" id="opcaoCadastral">
                              <option value="personal">Personal</option> 
                              <option selected value="professor">Professor</option>                              
                              <option value="gerente academia">Gerente Academia</option>
                              <option value="atendente Academia">Atendente Academia</option>
                              <option value="gerente Loja">Gerente Loja</option>
                              <option value="atendente Loja">Atendente Loja</option>
                              <option value="Administrador">Administrador</option>
                              <option value="Funcionario geral">Funcionário geral</option>
                              
                          </select>
                      </div>

                        
                        
                           <div class="col-md-12">
                              <div>
                                <img src="" alt="Time4Fit todos os direitos reservados" style="box-shadow: 3px 3px 4px #000;" class="img-circle" width="250" height="250" id="imgAluno" />
                              </div>


                            
                            
                            <button id="btnCapturarImagem" data-toggle='modal' data-target='#modalCamera' onclick="iniciaFoto()" style="position: absolute; top: 195px; left: 15px; box-shadow: 3px 3px 4px black;" >

                              <img src="images/photo-128.png" alt="Time4Fit todos os direitos reservados" class="img-rounded" width="50" height="40" />

                            </button>

                            <br /><br />

                            <button class="btn btn-lg btn-warning" onclick="capturarBiometria()"> Cadastrar Biometria </button>

                            
                          </div>
                       


                        

                        <br /> <br />
                        <div id="divBiometria">
                          <input type="hidden" id="hidValorBiometria" />
                          <object classid="CLSID:F66B9251-67CA-4d78-90A3-28C2BFAE89BF" height=0 width=0 id="objNBioBSP" name="objNBioBSP"></object>

                           <script lang='javascript'>
                           
                                var err, payload;
                                var result = false;
                                DEVICE_AUTO_DETECT  = 255;
                                var objNBioBSP = new ActiveXObject('NBioBSPCOM.NBioBSP.1');
                                var objDevice = objNBioBSP.Device;
                                var objExtraction = objNBioBSP.Extraction;
                                var objMatching = objNBioBSP.Matching;
                                var objIndexSearch = objNBioBSP.IndexSearch;
                                var n = 0;
                                var nUserID;



                                function regist()
                                {

                                  try // Exception handling
                                  {
                                    objDevice.Open(DEVICE_AUTO_DETECT);
                                    err = objDevice.ErrorCode;  // Get error code
                                    if ( err != 0 )   // Device open failed
                                    {
                                      alert('Falha ao abrir leitor biométrico');
                                    }
                                    else
                                    {
                                      //objExtraction.Enroll(payload);
                                      objExtraction.Enroll(nUserID, 0);

                                      err = objExtraction.ErrorCode;  // Get error code
                                      if ( err != 0 )   // Enroll failed
                                      {
                                        alert('Registration failed ! Error Number : [' + err + ']');
                                      }
                                      else  // Enroll success
                                      {
                                            objIndexSearch.AddFIR(objExtraction.TextEncodeFIR, nUserID);
                                            alert('Digital capturada com sucesso!');
                                            
                                            /*
                                            result = true;
                                            var codC = $('input[name="codC"]').val();
                                          var action = 'sistema/gerenciar_personal.php';
                                        var buscar = $.post(action,{opc : '1',codigo : codC,digital : (objExtraction.TextEncodeFIR)});
                                            buscar.done(valor);
                                            function valor(result){
                                                document.location.href="painel.php?exe=gerenciar/biometria&c="+codC;            
                                            }
                                            */

                                          $('#hidValorBiometria').val(objExtraction.TextEncodeFIR);


                                      }
                                      objDevice.Close(DEVICE_AUTO_DETECT);
                                    }
                                    }
                                  catch(e)
                                  {
                                    alert(e.message);
                                    return(false);
                                  }
                                  if ( result )
                                  {
                                    // Submit main form

                                    //document.MainForm.submit();
                                  }
                                  return result;

                                }
                                
                            </script>  
                          </div>





                        <!--button type="button" class="btn btn-success" id="btnEnviarInfo" onClick="enviarInfo()">Enviar informações e iniciar 2ª etapa do Cadastro ::</button-->
                       <button id='btnCadastrar' style='margin-left: 1em;' class='btn btn-success' onclick="salvarPersonal()">  Efetivar Cadastro   </button>
                       <button id='btnLimpar'    style='margin-left: 1em;' class='btn btn-info'    onclick="limpar()">  Limpar   </button>
                       <button id='btnCancelar'  style='margin-left: 1em;' class="btn btn-warning" onclick="btnCancelarCadastro()"> Cancelar </button>

        </div>
      </div>

<!--/form-->

</div>



    
	<div class="col-md-12">     

      <ul class="breadcrumb">
              <li><a href="principal.php?acao=principal"> Home </a></li>        
              <li class="active"> Gerenciar Funcionários </li>
      </ul>

			<h3 class="alert-info"> GERENCIAR FUNCIONÁRIOS </h3>


			<div class="col-md-12 bg-cinza-claro">	
            
            		<table class='table table-hover table-bordered'>
                    <tr>
                      <td align="left">
                          <label>  Pesquisa por Nome <br />
                              <input type="text" class="form-control" id="txtBusca" style="color:orange;" size="40"  onkeyup="buscaPersonalPorNome($(this).val())">
                          </label>
                      </td> 
                      <td colspan="8">

                          <button  class="btn btn-success" id="btnNovoCadastro" onclick="btnNovoCadastro()"><i class="mdi mdi-human"></i> Novo Funcionário/Personal</button>
                          
                      </td>                   
                       </th>
    	               <tr>
    		                <th class='bg-black-fosco'> Nome </th>
    		                <th class='bg-black-fosco'>CPF</th>
    		                <th class='bg-black-fosco'>RG</th>
    		                <th class='bg-black-fosco'>Nº INS</th>
    		                <th class='bg-black-fosco'>Inicio</th>
    		                <th class='bg-black-fosco'>Status</th>
    		                <th class='bg-black-fosco' colspan="3">Ações</th>
    	                </tr>
                      
      	                <tbody id="corpoTabela"></tbody>
                      
                  </table>
        </div>
          
				
  </div>


  <div class="col-md-12">

      <h3 class="alert-info"> FUNCIONÁRIOS INATIVOS </h3>


        
            
                <table class='table table-hover table-bordered'>
                      <tr>
                        <th class='bg-black-fosco'> Nome </th>
                        <th class='bg-black-fosco'>CPF</th>
                        <th class='bg-black-fosco'>RG</th>
                        <th class='bg-black-fosco'>Nº INS</th>
                        <th class='bg-black-fosco'>Inicio</th>
                        <th class='bg-black-fosco'>Status</th>
                        <th class='bg-black-fosco' colspan="3">Ações</th>
                      </tr>
                      
                        <tbody id="corpoInativos"></tbody>
                      
                  </table>
          
        
  </div>
    




<br />




<!-- Modal Camera -->
<div id="modalCamera" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
      <!-- Modal content-->
    <div class="modal-content" >
      
      <div class="modal-header" style="background-color: #FF9900;">
        <button type="button" class="close"  data-dismiss="modal" onclick="$(function(){webcam.reset(); $('#divCamera').html(webcam.get_html(770, 440,770, 440));});"  id="btnFechar1">&times;</button>
        <h4 class="modal-title" align="center">Tirar Foto</h4>
      </div>
      
      <div class="modal-body" align="center" style="background-color: #333333">
        <div id="divCamera"></div>
        <script type="text/javascript" src="webcam/webcam.js"></script>
              <script type="text/javascript">


                function iniciaFoto(){
                  //Configurando o arquivo que vai receber a imagem
                    webcam.set_api_url('webcam/upload.php');

                    //Setando a qualidade da imagem (1 - 100)
                    webcam.set_quality(100);

                    //Habilitando o som de click
                    webcam.set_shutter_sound(true);

                    //Definindo a função que será chamada após o termino do processo
                    webcam.set_hook('onComplete', 'my_completion_handler');

                    $('#divCamera').html(webcam.get_html(770, 440,770, 440));
                    
                }     
                    

                  //Função para tirar snapshot
                  function take_snapshotFoto() {
                     webcam.snap();

                  }

                  //Função callback que será chamada após o final do processo
                  function my_completion_handler(msg) {
                      if (msg.match(/(http\:\/\/\S+)/)) {
                          //var aluno = $('div[class="iconFoto"]').attr("id");
                      //alert('aqui');
                         //document.location.href="painel.php?exe=gerenciar/ver_aluno&c="+aluno;
                          webcam.reset();

                          buscaFoto($('#hidIdAluno').val());
                          
                      }
                      else {
                        webcam.reset();
                        buscaFoto($('#hidIdAluno').val());
                          //alert("PHP Erro: " + msg);
                      }
                  }
              </script>

           
                          <div class="iconFoto" type=button value="Tirar Foto" onClick="take_snapshotFoto()">
                              <img src="images/foto.png"/>
                          </div>
                          
                        
               
                      <div id="upload_results"></div>
      </div>
      <div class="modal-footer" style="background-color: #FF9900;">
        <button type="button" class="btn btn-default" onclick="$(function(){webcam.reset(); $('#divCamera').html(webcam.get_html(770, 440,770, 440));});"  id="btnFechar2" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim Modal Camera -->
