	<!--?php

	include('bd/consulta-perfil-aluno.php'); 
	include('bd/consulta-frequencia-aluno.php');
	include('bd/consulta-contrato-aluno.php');
	include('bd/consulta-parcelas-cobranca.php'); 

?-->



<div class="col-md-12" role="main">
	
    
	
    <script src="scripts/perfil-aluno.js"></script>
	<!--script src="scripts/webcam.js"></script-->
	<script src="scripts/upgrade.js"></script>
	<script src="scripts/catraca.js"></script>
	<script src="scripts/convidados.js"></script>
	<script src="scripts/login.js"></script>
	


	<style>
		.tblAluno td
		{
			height: 26px!important;
			margin-left: 1em!important;
		}

	</style>

	<input type="hidden" id="hidIdAluno" value=<?php echo (isset($_GET['id']))?$_GET['id']:null;?> />
  	<input type="hidden" id="hidBiometria" value=<?php echo (isset($_GET['codigoBio']))?$_GET['codigoBio']:null;?> />
  	<input type="hidden" id="hidNivelAdm" value=<?php echo $_SESSION["status"];?> >
  	<input type="hidden" id="hidIdContrato"/>
  	<input type="hidden" id="hidRgAluno"/>
  	<input type="hidden" id="hidIdPlano"/>
  	<input type="hidden" id="hidContratoAtualVencido"/>
  	<input type="hidden" id="hidProxVencimento"/>
  	<input type="hidden" id="hidQuantidadeBioimpedanciaPorMes"/>
  	<input type="hidden" id="hidQuantidadeConvidadosPorMes"/>
  	<input type="hidden" id="hidContratoListaNegra"/>
  	<input type="hidden" id="hidFormaPagtoContratoAtual"/>


		    <ul class="breadcrumb">
		        <li><a href="principal.php?acao=principal">Home</a></li>
		        <li><a href="principal.php?acao=gerencia-alunos">Gerencia Alunos</a></li>
		        <li class="active">Perfil do Aluno</li>
		    </ul>


	<div class="col-md-12 bg-warning">


				<!--a href="fatias/detalhe-cancelar-contrato.php" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
			BRUNO BRUNO TESTANDO
		</a-->

		<div class="col-md-5">
        	    <button class="btn btn-warning" type="button" role="button" onclick="capturarBiometria()">Biometria    </button>
                <button class="btn btn-warning" role="button" style="display:none" data-toggle='modal' data-target='#modalBioImpedancia' id='btnBioimpedancia' >BioImpedância</button>
                <button class="btn btn-warning" role="button" onClick="alterarDados()">Alterar Dados</button>
                <button class="btn btn-warning" role="button" style="display:none" data-toggle='modal' data-target='#modalConvidados' id='btnConvidados' onclick="">Convidados</button> 
				<button class="btn btn-warning" role="button" onClick="Treino()">Treino</button>
		</div>
        
        <div class="col-md-4" align="center">
                <!-- <button class="btn btn-success"  role="button" style="display:none" id="btnRenovarContrato" >Renovar Contrato</button> -->                
                <button class="btn btn-success"  role="button" style="display:none" onclick="novoContrato()" id="btnNovoContrato" >Novo Contrato</button>
                <button class="btn btn-success" role="button" style="display:none"  onclick="btnUpgrade()" id="btnUpgrade" >Upgrade</button>              
        </div>
        

		<div class="col-md-3" align="right">	
			<button class="btn btn-danger"  role="button" id="btnDesativarVip" onclick="desativarVip()" style="display:none">Desativar Aluno VIP</button>	
        	<button class="btn btn-danger"  role="button">Excluir Aluno</button>	
            <label style="display:none"> <h4>    Lista Negra    <input type="checkbox" id="checkListaNegra" onclick="listaNegra()">    </h4> </label>
            <button class="btn btn-danger"  data-toggle='modal' data-target='#modalListaNegra' role="button">Lista Negra</button>	
		</div>


		<br /><br />

	</div>

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

	<!--img src='/time4fit/images/loader.gif' onclick="window.open('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAYE','Ratting','width=550,height=170,0,status=0,');" /-->

    <div class="bg-black-fosco col-md-12">   	

	    	<div class="col-md-2" align="center">

				
				<div class="col-md-12">
		    		<div>
						<img src="" alt="Time4Fit todos os direitos reservados" style="box-shadow: 3px 3px 4px #000;" class="img-circle" width="250" height="250" id="imgAluno" />
					</div>


					
					
					<button id="btnCapturarImagem" data-toggle='modal' data-target='#modalCamera' onclick="iniciaFoto()" style="position: absolute; top: 195px; left: 15px; box-shadow: 3px 3px 4px black;">

						<img src="images/photo-128.png" alt="Time4Fit todos os direitos reservados" class="img-rounded" width="50" height="40" />

					</button>


				</div>
				
				<div class="col-md-12" id="divLiberaCobranca" style="background-color:#449d44; box-shadow: 3px 3px 4px #000; cursor:pointer; margin-top: 8px; height: 10%; width: 250px;" align="center">

					<div  align="center">

						<label id="lblCobranca" style="margin-top:8px; cursor:pointer;">COBRANÇA</label>

					</div>

					<!--div class="col-md-6" align="right" style="margin-top: 5px;">
					
						<button class="btn btn-xs btn-warning" role="button" onclick="cadastrarEntradaCatraca('COBRANÇA')" id="btnLiberaCatracaCobranca"> liberar </button>

					</div-->
					
				</div>


				<div class="col-md-12" id="divLiberaContrato" style="background-color:#449d44; box-shadow: 3px 3px 4px #000; cursor:pointer; margin-top: 8px; height: 10%; width: 250px;" align="center">

					<div  align="center">
						<label id="lblContrato" style="margin-top:8px; cursor:pointer;">CONTRATO</label>
					</div>

					<!--div class="col-md-6" align="right" style="margin-top: 5px;">
						<button class="btn btn-xs btn-warning" role="button" onclick="cadastrarEntradaCatraca('CONTRATO')" id="btnLiberaCatracaContrato" align='right'> liberar </button>
					</div-->
				
				</div>


				<div class="col-md-12" id="divLiberaExame" style="background-color:#449d44; box-shadow: 3px 3px 4px #000; cursor:pointer; margin-top: 8px; height: 10%; width: 250px;" align="center">

					<div  align="center">
						<label id="lblExame" style="margin-top:8px; cursor:pointer;">EXAME</label>
					</div>


					<div class="col-md-6" align="right" style="margin-top: 5px;">
						<button class="btn btn-xs btn-warning" role="button" onclick="cadastrarEntradaCatraca('EXAME')" id="btnLiberaCatracaExame" align='right'> liberar </button>
					</div>


				</div>


				<div class="col-md-12" id="divListaNegra" style="background-color:#449d44; box-shadow: 3px 3px 4px #000; cursor:pointer; margin-top: 8px; height: 10%; width: 250px;">
					<label style="margin-top:8px; cursor:pointer;">LISTA NEGRA</label>
				</div>

				<div class="col-md-12" id="divSimularBiometria" style="background-color:#449d44; box-shadow: 3px 3px 4px #000; cursor:pointer; margin-top: 8px; height: 10%; width: 250px;">
					<button class="btn btn-xs btn-warning" role="button" onclick="cadastrarEntradaCatraca('BIOMETRIA');carregaAlunos('','listaGeral');" id="btnLiberaCatracaBiometria" align='right'> SIMULAR ENTRADA - BIOMETRIA </button>
				</div>
	    	
	    	</div>

	    	
	    	<div class="col-md-5 col-md-offset-1"  id="divCorpo">
					<table class="table-stripped">
						  <tr>
						     <th colspan="2">
								<h2>DADOS DO ALUNO</h2>
				     		</th>
						  </tr>
					</table>
					
					<table class="table-stripped tblAluno" cellspacing="10" id="tblAluno"> </table>

	    	</div>
			
			<div class="col-md-4" id="divContrato">	</div>

			<div class="col-md-4">
					<h4 class="bg-warning text-muted" align="right"> Frequência do Aluno </h4>
					<div style="max-height:190px;overflow:auto;">
						<table class="table table-condensed active" id="tblFrequencia"></table>
					</div>
				
			</div>


	</div>
	


	<div class="col-md-12 bg-cinza-claro"> 

		<br /><br />
			
		<h3 class="alert-info" > HISTÓRICO DE CONTRATOS </h3>
		<table class="table table-hover table-bordered"  style="border:1px;" id="tblContratos"></table>				
		
	</div>



	<div class="col-md-12 bg-cinza-claro">

		<br /><br />

		<h3 class="alert-info" > EXTRATO DE PAGAMENTOS </h3>
		<table class="table table-hover table-bordered" id="tblParcelas" ></table>
				
	</div>





<!-- Modal Pagamento Manual -->
			<div id="modalPagar" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content" style="width: 400px;">
			      <div class="modal-header" style="background-color: #FF9900;">
			        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal" onclick="carregarTela()">&times;</button>
			        <h4 class="modal-title" align="center">Baixa Manual</h4>
			      </div>
			      <div class="modal-body" align="center" style="background-color: #333333">
			      		 <input type="hidden" name="idParcela" id="idParcela" value="">
			      		 <label class="bg-black-fosco"> Aluno </label>
						<input type="text" style="text-align: center;" class="form-control" id="txtNomeAluno" disabled="disabled" placeholder="Nome do Aluno" >
						
						<label class="bg-black-fosco"> Vencimento </label>
						<input type="text" style="text-align: center;" class="form-control" onkeyup="mascara(this, mdata);" tooltip="Vencimento" disabled="disabled" maxlength="10" id="txtVencimento" placeholder="Data do Vencimento" >
						
						<label class="bg-black-fosco"> Parcela </label>
						<input type="text" style="text-align: center;" class="form-control" id="txtParcela" onkeyup="mascara(this, mvalor);" disabled="disabled" maxlength="10" placeholder="parcela nº" > 
						
						<label class="bg-black-fosco"> Juros </label>
						<input type="text" style="text-align: center;" class="form-control" id="txtJuros" onkeyup="mascara(this, mvalor);" onblur="calculaTotal($(this).val())" maxlength="10" placeholder="Juros" >

						<label class="bg-black-fosco"> Desconto </label>
						<input type="text" style="text-align: center;" class="form-control" id="txtDesconto" onkeyup="mascara(this, mvalor);" onblur="calculaTotal($(this).val())" maxlength="10" placeholder="Desconto" >
						
						<label class="bg-black-fosco"> Valor da Parcela </label>
						<input type="text" style="text-align: center;" class="form-control" id="txtValorParcela" disabled="disabled" onkeyup="mascara(this, mvalor);" maxlength="10" placeholder="Valor da Parcela" >
						
						<label class="bg-black-fosco"> Data do Pagamento </label>
						<input type="text" style="text-align: center;" class="form-control data" id="txtDtPago" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data Pagamento" >
						
						<label class="bg-black-fosco"> Total a Pagar (R$)</label>
						<input type="text" style="text-align: center;" class="form-control btn-danger" id="txtAPagar" disabled="disabled" placeholder=" Total À Pagar" >
						

						<button style="text-align: center;" class="btn btn-success btn-lg" id="btnPagar" onclick="baixaParcela()"> Dar Baixa </button>
		        		<input type="hidden" id="hidValor">
		        		<input type="hidden" id="hidStatusParcela">

			      </div>
			      <div class="modal-footer" style="background-color: #FF9900;">
			        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="carregarTela()"> Fechar </button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Pagamento Manual -->



<!-- Modal Informações de Frequência -->
<div class="modal fade" id="modalFrequencia2" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FF9900;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Consulta Frequência por Período </h4>
      </div>
      <div class="modal-body" style="background-color: #333333">
        <div class="container-fluid">

        	<div class="col-md-6" style="height:448px">
     
			          
			          <div style="heigth:20%">
			          		<div class="col-md-5">
			          			<input type="text" class="form-control data" id="dtInicio"  onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data de Nascimento (apenas números)">
			          		</div>
			          		<div class="col-md-2" align="center">
			          			<label style="color:white">até</label>
			          		</div>
			          		<div class="col-md-5">
			          			<input type="text" class="form-control data" id="dtFim"  onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data de Nascimento (apenas números)">
			          		</div>
			          </div>
						<div class="row" style="heigth:10%">
							<div class="col-md-12" align="center">
								<button class="btn btn-success" role="button" onClick="carregarFrequencia()">Consultar</button>
								<button class="btn btn-success" id="btnCarregar" style="display:none" role="button"></button>
							</div>
						</div>
				          <!--div class="row">
				            <div class="col-md-12">
				            	
				            </div>
				          </div-->

				          <div id="divCanvas" style="heigth:70%" >
				          		<canvas style="margin-top:20%" id="GraficoBarra"></canvas>
				          </div>
				          
			</div>
			<div class="col-md-6">
     			
     			<h3 class="alert-info"> Frequência </h3>
				<div style="max-height:445px;overflow:auto;">
					<table class="table table-hover table-bordered" id="tblEntradasPorPeriodo" ></table>
				</div>

     		</div>
        </div>

      </div>

      <div class="modal-footer" style="background-color: #FF9900;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Fim Modal Informações de Frequência -->



<!-- Modal Cancelar Contrato -->
<div class="modal fade" id="modalCancelarContrato" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 1000px;">
      <div class="modal-header" style="background-color: #FF9900;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel" align="center">Cancelar Contrato: <label id="lblFormaCancelContrato"></label> </h4>
      </div>
      <div class="modal-body" style="background-color: #333333">
      		<script src="scripts/detalhe-cancelar-contrato.js"></script>
        
        	
        		<input type="hidden" id="hidFormaPagamento">
        		<input type="hidden" id="hidIdContratoCancela">
        		<input type="hidden" id="hidIdAlunoCancela">
        		<input type="hidden" id="hidDiaPgtoContratoAtual">
     
			          
			          <div class="row">
			          		
							
								<table class="table  table-bordered table-hover" id="tblParcelasCancelar" ></table>
						
			          </div>

			         

					<div id="divInfoPagto" >

						<div class="row">
						<div class="col-xd-12" align="center">

						    

						        <h4 class="bg-cinza-prata"> Para Obter privilégios Administrativos, faça login </h4>
						          
						        <form class="form-inline">
						          <div class="form-group">
						            <label class="sr-only" for="login">Login</label>
						            <input type="text" class="form-control" id="txtLogin" placeholder="Login">
						          </div>
						          <div class="form-group">
						            <label class="sr-only" for="senha">Password</label>
						            <input type="password" class="form-control" id="txtSenha" placeholder="Senha">
						          </div>  
						          <a class="btn btn-sm btn-success" id="btnLogaAdm" onclick="LogaAdm()" role="button"> Liberar </a>
						          <a class="btn btn-sm btn-danger" id="btnDeslogaAdm" onclick="deslogaAdm()" role="button" disabled='true'> Encerrar Sessão </a>
						          <input type="hidden" id="operador" value="">
						        </form>
						        <div class="bg-cinza-prata" style="height:19px; margin-top:10px">  </div>

						 </div>
						</div>
                    	
                        <div class="row" style="margin-top:1em;">
							<div class="col-xd-12"   align="center">
								<div class="col-md-3" align="center">
											<label style="color:white;">Cobrar Recisão: </label>
								</div>

								<div class="col-md-3"  align="left" >
									<select id="slcRecisao" onchange="alteraCobrarRecisao()" disabled="disabled">
	                                	<option value='s'>Sim</option>
	                                    <option value='n'>Não</option>
	                                </select>
								</div>

								<div class="col-md-3" align="center">
											<label style="color:white;">Forma: </label>
								</div>

								<div class="col-md-3"  align="left" >
									<select id="slcFormaPagamento" disabled='disabled' >
	                                    <option value='extorno'>Extorno</option>
	                                    <option value='bl'>Boleto</option>
	                                </select>
								</div>
							</div>
						</div>


                        <div class="row" style="margin-top:2em;">
							<div class="col-md-12"   align="center">
								<div class="col-md-3" align="center">
									<label style="color:white;" id="">Total Pendente:</label>
								</div>

								<div class="col-md-3"  align="left" >
									<input type="text" id="txtTotalValorPendente" disabled style="  width: 200px; text-align: -webkit-center;">
								</div>

								<div class="col-md-3" align="center">
											<label style="color:white;" id="">Total Pago:</label>
								</div>

								<div class="col-md-3"  align="left" >
									<input type="text" id="txtTotalValorPago" disabled style="   width: 200px; text-align: -webkit-center;">
								</div>
							</div>
						</div>


						<div class="row" style="margin-top:2em;">
							<div class="col-md-12" id="tdValor" align="center">
								<div class="col-md-6" align="center">
											<label style="font-size: xx-large; color:white;" id="lblTituloValor">A Pagar (20%):  </label>
								</div>

								<div class="col-md-6"  align="center">
									<input type="text" id="txtValorCobrado" onblur="alterarValorFinal()" style="font-size: xx-large;   width: 200px; text-align: -webkit-center;">
								    <input type="hidden" id="hidValor">
								</div>
									

							</div>
						</div>

						
				
			</div>

      </div>

      <div class="modal-footer" style="background-color: #FF9900;">
        <button class="btn-lg btn-success" role="button" style="width:400px; font-weight: bolder;" onclick="$(function(){webcam.reset();});" id="btnFimCancelaContrato">Finalizar Cancelamento do Contrato</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Fim Modal Cancelar Contrato  -->



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



<!-- Modal BioImpedancia -->
			<div id="modalBioImpedancia" class="modal fade" role="dialog">
			<script src="scripts/bioimpedancia.js"></script>
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content" style="width: 400px;">

				      <div class="modal-header" style="background-color: #FF9900;">
					        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
					        <h4 class="modal-title" align="center">Cadastrar BioImpedancia</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">

				      		  <div class='vermelho-laranja' align='center' id="divLimiteBio"> Limite mensal de Bioimpedância atingido 
				      		  </div>
				      		 <button class="btn btn-success" id="btnIncluirBio" onclick="cadastrarBioimpedancia()"> Incluir Exame BioImpedância</button>
							
							<div id="tabelaBioImpedancia"></div>
							
				      </div>

				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal BioImpedancia -->

<!-- Modal Lista Negra -->
			<div id="modalListaNegra" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">

				      <div class="modal-header" style="background-color: #FF9900;">
				      		<input type="hidden" id="hidIdListaNegra" />
					        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
					        <h4 class="modal-title" align="center">Lista Negra</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">



				      	<div class="col-md-12" align="center">

						    <br /> 

						        <h4 class="bg-cinza-prata"> Para Obter privilégios Administrativos, faça login </h4>
						          
						        <form class="form-inline">
						          <div class="form-group">
						            <label class="sr-only" for="login">Login</label>
						            <input type="text" class="form-control" id="txtLogin" placeholder="Login">
						          </div>
						          <div class="form-group">
						            <label class="sr-only" for="senha">Password</label>
						            <input type="password" class="form-control" id="txtSenha" placeholder="Senha">
						          </div>  
						          <a class="btn btn-sm btn-success" id="btnLogaAdm" onclick="LogaAdm()" role="button"> Liberar </a>
						          <a class="btn btn-sm btn-danger" id="btnDeslogaAdm" onclick="deslogaAdm()" role="button" disabled='true'> Encerrar Sessão </a>
						          <input type="hidden" id="operador" value="">
						        </form>

						        <br /> 

						 </div>

							<form>



				      		 <h4 class="bg-black-fosco">Motivo da inclusão na Lista Negra</h4>
				      		 <textarea rows="4" cols="120" id="txtMotivo"></textarea>

				      		 <button type="button" class="btn btn-success" id="btnListaNegra" onclick="listaNegra()"> Incluir na Lista Negra </button>

				      		</form>
				      		
							
							
							
				      </div>

				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Lista Negra -->



<!-- Modal Convidados -->
			<div id="modalConvidados" class="modal fade" role="dialog">
			
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">

				      <div class="modal-header" style="background-color: #FF9900;">
					        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
					        <h4 class="modal-title" align="center">Liberar convidado</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">

				      		 <label class="bg-black-fosco">Insira o nome do convidado</label>
				      		 <input type="text" class="form-control" id="txtConvidado" size="50" onkeyup="buscando()">
				      		 <input type="hidden" id="hidIdConvidado" value="">
				      		 <table class="table table-bordered bg-black-fosco">
							 	<tr>
							 		<td>Aluno</td>
							 		<td>Liberar Entrada</td>
							 	</tr>
							 	<tbody id='carregaAConvidar'>
							 									 		
							 	</tbody>
							 </table>

							 <hr />

							 <h4 class="bg-cinza-prata"> Convidados já inclusos neste mês </h4>
							 <table class="table table-hover bg-black-fosco">
							 	<tr>
							 		<td class="bg-black-fosco">Aluno</td>
							 		<td class="bg-black-fosco">Data</td>
							 		<td class="bg-black-fosco">Ações</td>
							 	</tr>
							 	<tbody id='carregaConvidados'>
							 									 		
							 	</tbody>
							 </table>
							
				      </div>

				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal COnvidados -->



<!-- Modal Upgrade -->
			<div id="modalUpgrade" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">

				      <div class="modal-header" style="background-color: #FF9900;">
					        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
					        <h4 class="modal-title" align="center">Fazer Upgrade</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">

				      		 <table class="table table-bordered bg-black-fosco">
							 	<tr>
							 		<td>Plano</td>
							 		<td>Período</td>
							 		<td>Mensalidade</td>
							 		<td>Taxa</td>
							 		<td>Forma Pgto</td>
							 		<td></td>
							 	</tr>
							 	<tbody id='tbodyPlanos'>
							 									 		
							 	</tbody>
							 </table>
							
				      </div>

				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Upgrade -->



<!-- Modal Anexo Contrato -->
			<div id="modalAnexoContrato" class="modal fade" role="dialog">
			
			  <div class="modal-dialog modal-lg" role="document">

			    <!-- Modal content-->
			    <div class="modal-content">
			    		<script src="scripts/webcamAnexo.js"></script>

				      <div class="modal-header" style="background-color: #FF9900;">
					        <button type="button" class="close" data-dismiss="modal" onclick="$(function(){webcam.reset();$('#divAnexo').html(webcam.get_html(770, 440,770, 440));});" id="btnFecharModalAnexo">&times;</button>
					        <h4 class="modal-title" align="center">Anexos</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">
				      		
			      				<div id="divAnexo"></div>
			      				<input type="hidden" id="hidIdContratoAnexo" />

								<script type="text/javascript" src="webcam/webcam.js"></script>
							        <script type="text/javascript">
							            



							            //Configurando o arquivo que vai receber a imagem
							            function iniciaFotoAnexo(){

							            	

							            	webcam.set_api_url('webcam/uploadAnexo.php');

								            //Setando a qualidade da imagem (1 - 100)
								            webcam.set_quality(100);

								            //Habilitando o som de click
								            webcam.set_shutter_sound(true);

								            //Definindo a função que será chamada após o termino do processo
								            webcam.set_hook('onComplete', 'my_completion_handler_anexo');

								            $('#divAnexo').html(webcam.get_html(770, 440,770, 440));

							            }
							            

							            //Função para tirar snapshot
							            function take_snapshotAnexo() {

							            	salvarAnexo2($('#hidIdContratoAnexo').val());

							            	 

							            }

							            //Função callback que será chamada após o final do processo
							            function my_completion_handler_anexo(msg) {
							                if (msg.match(/(http\:\/\/\S+)/)) {
							                    //var aluno = $('div[class="iconFoto"]').attr("id");
							            		//alert('aqui');
							                   //document.location.href="painel.php?exe=gerenciar/ver_aluno&c="+aluno;
							                    webcam.reset();

							                    mostraAnexos($('#hidIdContratoAnexo').val());
							                    $('#txtDescricaoAnexo').val('');
							                    
							                }
							                else {
							                	webcam.reset();
							                	mostraAnexos($('#hidIdContratoAnexo').val());
							                	$('#txtDescricaoAnexo').val('');
							                    //alert("PHP Erro: " + msg);
							                }
							            }
							        </script>

							        

							    <div class="row" style="margin-top:10px;">
						    		<input type="text" id="txtDescricaoAnexo" placeholder="Descriçao do Anexo" style="width:400px">
							    </div>    
						                    
								<div class="iconFoto row" style="margin-top:10px;" type=button value="Tirar Foto" onClick="take_snapshotAnexo()">
										<img src="images/foto.png"/>
								</div>
						                      
						                    
						           
						                  <div id="upload_results"></div>
							      


							      <div class="modal-body" align="center" style="background-color: #333333">

							      		 <table class="table table-bordered bg-black-fosco">
										 	<tr>
										 		<td>Anexo</td>
										 		<td>Descrição</td>
										 		<td></td>
										 	</tr>
										 	<tbody id='tbodyAnexo'>
										 									 		
										 	</tbody>
										 </table>
										
							      </div>
							

						</div>									


				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" id="btnFecharModalAnexo1" onclick="$(function(){webcam.reset(); $('#divAnexo').html(webcam.get_html(770, 440,770, 440));});"  data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Anexo Contrato -->



<!-- Modal Atestado Médico -->
			<div id="modalAtestadoMedico" class="modal fade" role="dialog">
			<script src="scripts/atestado-medico.js"></script>
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">

				      <div class="modal-header" style="background-color: #FF9900;">
				      		<input type="hidden" id="hidIdListaNegra" />
					        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
					        <h4 class="modal-title" align="center">Atestado Médico</h4>
				      </div>

				      <div class="modal-body" align="center" style="background-color: #333333">
				      		<div id="divDadosAtestado">
				      	 	 <input type="hidden" id="idContratoAtestado" />

				      		 <label class="bg-black-fosco">Descrição - Atestado Médico</label>
				      		 <textarea class="form-control" rows="4" cols="50" id="txtAtestado"></textarea>

							 <label class="bg-black-fosco"> Quantidade de dias </label>
				      		 <input type="text" class="form-control" id="txtQuatidade" size="10" lenght="2" />
							 
				      		 <button type="button" class="btn btn-success" style="margin: 1em;" id="btnCadastraAtestadoMedico" onclick="cadastraAtestado()"> Incluir Atestado e prorrogar Contrato </button>
				      		</div>
				      		 <table class="table table-bordered bg-black-fosco">
										 	<tr>
										 		<td>Nome</td>
										 		<td>Descricao</td>
										 		<td>Dias Afastado</td>
										 		<td>Data</td>										 		
										 	</tr>
										 	<tbody id='tbodyAtestado'>
										 									 		
										 	</tbody>
							 </table>							
							
							
				      </div>

				      <div class="modal-footer" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Atestado Médico -->





</div>