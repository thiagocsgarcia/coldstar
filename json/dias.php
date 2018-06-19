<?php

include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


			case 'listaDias':

				
			
				$dia = $time4bd->fetchAll("select id, DATE_FORMAT(data, '%d/%m/%Y') data, codigo, usuario, (select count(*) from dias) totalDias from dias order by data desc LIMIT 365");
				
				echo json_encode($dia, JSON_PRETTY_PRINT);

			break;



			case 'buscaFornecedorNome':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from fornecedores where nFantasia = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;



			case 'buscaFornecedorId':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from fornecedores where id = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;
			


			case 'cadastrarFornecedor':

			$idFornecedor = $_POST['idFornecedor'];

					$fornecedor = array(									
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
										//'codigo'=> $_POST['subPlano'],
										'st'=> $_POST['st'],
										'ipi'=> $_POST['ipi'],
										'icms'=> $_POST['icms']);

					

					if($idFornecedor == ''){

						$inseridos = $time4bd->insert('fornecedores',$fornecedor);

						$retornar = $time4bd->fetchAll("SELECT * from fornecedores");
						echo json_encode($retornar, JSON_PRETTY_PRINT);

					}else{

						$atualizados = $time4bd->update('fornecedores',$fornecedor,"id=$idFornecedor");

						$retornar = $time4bd->fetchAll("SELECT * from fornecedores");
						echo json_encode($retornar, JSON_PRETTY_PRINT);
					}					

			break;



			case 'deletarFornecedor':

					$idFornecedor = $_POST['idFornecedor'];

					$deletados = $time4bd->delete('fornecedores',"id=$idFornecedor");


					$retornar = $time4bd->fetchAll("SELECT * from fornecedores");
					echo json_encode($retornar, JSON_PRETTY_PRINT);


			break;

	}



?>