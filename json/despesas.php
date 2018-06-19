<?php

include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


			case 'carregarDespesa':
			
				$grupo = $time4bd->fetchAll("SELECT * from despesas");
				
				echo json_encode($grupo, JSON_PRETTY_PRINT);

			break;



			case 'buscaDespesaNome':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from despesas where descricao = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;



			case 'buscaDespesaId':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from despesas where id = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;
			


			case 'cadastrarDespesa':

			$idDespesa = $_POST['idDespesa'];

					$despesa = array(									
										'cpf'=> $_POST['cpf'],						
										'rg'=> $_POST['rg'],
										'cnpj' => $_POST['cnpj'],
										'insE'=> $_POST['insE'],
										'tipoC'=> $_POST['tipoC'],
										'rSocial'=> $_POST['rSocial'],
										'nfantasia'=> $_POST['nfantasia'],
										'endereco'=> $_POST['endereco'],
										'numero'=> $_POST['numero'],
										'complemento'=> $_POST['complemento'],
										'cep'=> $_POST['cep'],					
										'bairro'=> $_POST['bairro'],
										'cidade'=> $_POST['cidade'],
										'estado'=> $_POST['estado'],
										'email'=> $_POST['email'],
										'contato'=> $_POST['contato'],
										'telefone'=> $_POST['telefone'],
										'celular'=> $_POST['celular'],
										'outros'=> $_POST['outros'],
										'site'=> $_POST['site'],
										'dataCadastrado'=> date("Y/m/d"),
										'codigo'=> $_POST['subPlano'],
										'st'=> $_POST['subPlano'],
										'ipi'=> $_POST['subPlano'],
										'icms'=> $_POST['subPlano']);

					

					if($_POST['idDespesa'] == ''){

						$inseridos = $time4bd->insert('despesas',$despesa);

						$retornar = $time4bd->fetchAll("SELECT * from despesas");
						echo json_encode($retornar, JSON_PRETTY_PRINT);

					}else{

						$atualizados = $time4bd->update('despesas',$despesa,'id=$idDespesa');

						$retornar = $time4bd->fetchAll("SELECT * from despesas");
						echo json_encode($retornar, JSON_PRETTY_PRINT);
					}					

			break;



			case 'deletarDespesa':

					$idDespesa = $_POST['idDespesa'];

					$deletados = $time4bd->delete('despesas','id=$idDespesa');


					$retornar = $time4bd->fetchAll("SELECT * from despesas");
					echo json_encode($retornar, JSON_PRETTY_PRINT);


			break;

	}



?>