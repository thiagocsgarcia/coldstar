<?php	include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


		case 'carregaGrupos':
		
			$grupo = $time4bd->fetchAll("SELECT * from grupos");
			
			echo json_encode($grupo, JSON_PRETTY_PRINT);

			break;



		case 'atualizaStatusAtivar':
		
			$idAluno = $_POST['id'];

			$idContrato = $_POST['idContrato'];

				$aluno = array('statusCadastro'=> 'ativo'); 

				$alterados = $time4bd->update("alunos",$aluno,"id=$idAluno");


				$contrato = $arrayName = array('status' => 'andamento'  );

				$updContrato = $time4bd->update("contratos",$contrato,"id=$idContrato");

				

				$retorno = $time4bd->fetchAll("SELECT * from `alunos` where id = $idAluno");

				echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;

		case 'verificaEmail':
		
			$email = $_POST['email'];

			$retorno = $time4bd->fetchAll("SELECT count(*) quantidade from `alunos` where email = '$email' ");

			echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;

		case 'cadastraPagamento':



								$idAluno = $_POST['aluno'];								

								$contratoTemp = $time4bd->fetchAll("SELECT id from contratos where id = (select max(id) from contratos where aluno ='$idAluno' and status = 'aguardando') ");
								
								if (empty($contratoTemp)){

									//continue;
								
								}
								else{ 

									$idContrato = "";

									foreach ($contratoTemp as $i => $ultimoContrato) {
										$temp = $ultimoContrato;
										$idContrato = $temp->id; 
									}
									//deletando o contrato que estava com status aguardando
									$deletados = $time4bd->delete("contratos","id=$idContrato");

									//deletando parcelas do contrato com status aguardando
									$whereParcelas[] = "codigoA = $idAluno";
									$whereParcelas[] = "codigo = $idContrato";
									$parcelasDeletadas = $time4bd->delete("areceber", $whereParcelas);
								
								}
									

								//AQUI O SCRIPT SETA O VALOR TOTAL DA PRIMEIRA PARCELA(valorTotalMatricula) E DEPOIS VERIFICA SE É CONTRATO ANTECIPADO. CASE SEJA ELE RETIRA O VALOR DA MATRICULA DA PRIMEIRA PARCELA E FAZ A CONTINUAÇÃO DE PARCELAS CONFORME A ULTIMA PARCELA DO ULTIMO CONTRATO VÁLIDO.


								$dataInicio = date("Y/m/d h:i");
								$dataFinal = null;
								$parcela = null;


								$valorTotalMatricula = $_POST['txtTotal'];

								if ($_POST['condicao'] == 'contratoAntecipado'){

									$contratoAtivo = $time4bd->fetchAll("SELECT id, dataFinal from contratos where idAluno = '$idAluno' and status = 'andamento' order by id desc limit 1 ");

										foreach ($contratoAtivo as $i => $meuContrato) {
											$contratoAtual = $meuContrato;
											
											$dataInicio = $contratoAtual->dataFinal;
											
											

											$valorTotalMatricula = $valorTotalMatricula - $_POST['totalMatricula'];

										}

								}
									

								/* $contratoAtivo2 = $time4bd->fetchAll("SELECT id, dataFinal from contratos where idAluno = '$idAluno' and status = 'cancelado' order by id desc limit 1 ");

										

										foreach ($contratoAtivo2 as $i => $meuContrato2) {
											$contratoAtual2 = $meuContrato2;

												//echo "teste";

											$date = date('Y-m-d');
											$timestamp1 = strtotime($date);
											$timestamp2 = strtotime('+6 month', $timestamp1);
											
											$tempoLimite = date('d/m/Y H:i:s', $timestamp2);

											echo $tempoLimite."<br /> <br />";
											



											
											if(strtotime($contratoAtual2->dataFinal) < strtotime($tempoLimite)){

												$valorTotalMatricula = $valorTotalMatricula - $_POST['totalMatricula'];

												echo $valorTotalMatricula;

											}

										} */

					

								//rotina que calcula a data final do contrato baseado no período contratado
								switch ($_POST['subPlano']) {
									case 'mensal':
										$parcelas = 1;

										$dia = date("d", strtotime($dataInicio));
										$mes = date("m", strtotime($dataInicio));
										$ano = date("Y", strtotime($dataInicio));

										for ($i=1; $i <= $parcelas; $i++) { 
											if($mes == 12){
												$mes = 0;
											}
											$mes = $mes + 1;
										}

										$mesPagto = $mes;


										$dataFinal = $ano."/".$mesPagto."/".$_POST['diaPagto'];

										break;
									case 'trimestral':
										$parcelas = 3;

										$dia = date("d", strtotime($dataInicio));
										$mes = date("m", strtotime($dataInicio));
										$ano = date("Y", strtotime($dataInicio));

										//print $dia." - ".$mes." - ".$ano;

										for ($i=1; $i <= $parcelas; $i++) { 
											if($mes == 12){
												$mes = 0;
												$ano = $ano + 1;
											}
											$mes = $mes + 1;
										}

										$mesPagto = $mes;


										$dataFinal = $ano."/".$mesPagto."/".$_POST['diaPagto'];

										break;
									case 'semestral':
										$parcelas = 6;

										$dia = date('d', strtotime($dataInicio));
										$mes = date('m', strtotime($dataInicio));
										$ano = date('Y', strtotime($dataInicio));

										for ($i=1; $i <= $parcelas; $i++) { 
											if($mes == 12){
												$mes = 0;
												$ano = $ano + 1;
											}
											$mes = $mes + 1;
										}

										$mesPagto = $mes;

										$dataFinal = $ano."/".$mesPagto."/".$_POST['diaPagto'];

										break;
									case 'anual':
										$parcelas = 12;

										$dia = date('d', strtotime($dataInicio));
										$mes = date('m', strtotime($dataInicio));
										$ano = date('Y', strtotime($dataInicio));

										$mesPagto = $mes - 1;
										$anoPagto = $ano + 1;

										$dataFinal = $anoPagto."-".$mesPagto."-".$_POST['diaPagto'];

										break;
									
									default:
										$parcelas = 1;
										break;
								}
								$mes = date('m');


								$descPlano = $_POST['plano'];
								$planotemp = $time4bd->fetchAll("SELECT * from planos where descricao = '$descPlano' ");

								foreach ($planotemp as $i => $planoArray) {
									$idPlano = $planoArray->id; 
								}	


								$contrato = array(
									'aluno'=> $idAluno,
									'idAluno'=> $idAluno,
									'plano'=> $_POST['plano'],
									'codigoPlano' => $idPlano,
									'subPlano'=> $_POST['subPlano'],
									'vMensal'=> $_POST['valorMensal'],
									'valorMatricula'=> $_POST['totalMatricula'],
									'valorTxa'=> $_POST['txaPlano'],
									'diaPagamento'=> $_POST['diaPagto'],
									'dataInicio'=> $dataInicio,
									'dataFinal'=> $dataFinal,
									'parcelas'=> $parcelas,
									//'cobraAcrescimo'=> $_POST['cobraAcrescimo'],
									'forma'=> $_POST['formaPagamento'],
									'status'=> 'aguardando',
									'valorTotalMatricula'=> $valorTotalMatricula);

								$inseridos = $time4bd->insert('contratos',$contrato);	

								//buscando o ultimo id contrato inserido
								

								
								$contratoTemp = $time4bd->fetchAll("SELECT c.id, p.id as plano from contratos c, planos p where p.descricao = c.plano and c.id = (SELECT max(id) from contratos where aluno = '$idAluno') ");

								foreach ($contratoTemp as $i => $ultimoContrato) {
									$temp = $ultimoContrato;
									$idContrato = $temp->id; 
									$planoContrato = $temp->plano; 
									//$subPlano = $temp->codigoSub;
									$proxContrato = '0';


									if ($_POST['condicao'] == 'contratoAntecipado'){
													
													$proxContrato = $temp->id;


													$updAluno = array(
													'codigoPlano'=> $planoContrato,
													//'codigoSubPlano' => $subPlano,
													'codigoContrato' => $idContrato,
													'statusCadastro' => 'passo2',
													'proxContrato' => $proxContrato,
													'passo2' => '1'); 

												$alterados = $time4bd->update("alunos",$updAluno,"id=$idAluno");

												}else{	

													$idContrato = $temp->id; 
													$planoContrato = $temp->plano; 
													$proxContrato = '0';												


													$updAluno = array(
													'codigoPlano'=> $planoContrato,
													'codigoContrato' => $idContrato,
													'statusCadastro' => 'passo2',
													'proxContrato' => $proxContrato,
													'passo2' => '1'); 

												$alterados = $time4bd->update("alunos",$updAluno,"id=$idAluno");

												}


										
								}

							
								
								//echo $idContrato;								
								
								$retorno = $time4bd->fetchAll("SELECT id, idAluno from contratos where id = '$idContrato' ");

								
								

								//if($inseridos > 0) header("LOCATION: geraCobranca.php?aluno=".$_POST['aluno']);
								//else print '<p> >> ERRO !! CONTATE O ADMINISTRADOR !!! << </p>';
								//ob_end_clean();
								echo json_encode($retorno, JSON_PRETTY_PRINT);  
					



			break;

		case "verificaQntMesUltimoContrato":

			$idAluno = $_POST["idAluno"];

			

			$retorno = $time4bd->fetchAll("select * from contratos where id in (select max(id) from contratos where idAluno = $idAluno ) ");

			echo json_encode($retorno, JSON_PRETTY_PRINT);  

			break;

		default:
			$foto = $time4bd->fetchAll("SELECT idAluno, foto FROM fotoaluno where idAluno = '1'");

			echo json_encode($foto, JSON_PRETTY_PRINT);
			

			break;
	


	}		

	


?>