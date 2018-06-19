<?php
include("conexao-bd-json.php");



	$opcao = $_POST['opcao'];	

	switch ($opcao) {

		case 'listaGeral':
			$retorno = $time4bd->fetchAll("SELECT id, nome, cpf, rg, nIns, date_format(dataInicio, '%d/%m/%Y') as dataInicio, status, inativo from `personal` where inativo = 'false' ORDER BY nome");

			echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;

		case 'listaInativos':
			$retorno = $time4bd->fetchAll("SELECT id, nome, cpf, rg, nIns, date_format(dataInicio, '%d/%m/%Y') as dataInicio, status, inativo from `personal` where inativo = 'true' ORDER BY nome");

			echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;


		case 'inativarFuncionario':
		
			
				$idFuncionario = $_POST['id'];

				$funcionario = array(
					'inativo' => $_POST['inativo']); 

				$alterados = $time4bd->update("personal",$funcionario,"id=$idFuncionario");

				$retorno = $time4bd->fetchAll("SELECT * from `personal`ORDER BY nome");

				echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;


		case 'buscaPersonalPorNome':

			$nome = $_POST['nome'];	
			$retorno = $time4bd->fetchAll("SELECT id, nome, cpf, rg, nIns, date_format(dataInicio, '%d/%m/%Y') as dataInicio, status from `personal` where nome like '$nome%' ORDER BY nome");

			echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;

		case 'pesquisa':

			$idPersonal = $_POST['id'];

			$retorno = $time4bd->fetchAll("SELECT id, nome, cpf, rg, email, nasc, nIns, date_format(dataInicio, '%d/%m/%Y') as dataInicio, ct, sexo, cep, endereco, numero, complemento, bairro, cidade, estado, telefone, celular, status, login, senha from `personal` WHERE id = '$idPersonal' ORDER BY nome");

			echo json_encode($retorno, JSON_PRETTY_PRINT); 

			break;

		case 'deletar':


				$idPersonal = $_POST['id'];

				$deletados = $time4bd->delete("personal","id=$idPersonal");

				$retorno = $time4bd->fetchAll("SELECT * from `personal` ORDER BY nome");

				echo json_encode($retorno, JSON_PRETTY_PRINT);
			

			break;

		case 'cadastrar':

			if($_POST['id'] == ''){

				$personal = array(
					'nome'=> $_POST['nomeCompleto'],
					'cpf'=> $_POST['cpf'],
					'rg'=> $_POST['rg'],
					'email'=> $_POST['email'],
					'nasc'=> $_POST['dataNascimento'],

					'nIns'=> $_POST['cref'],
					'dataInicio'=> $_POST['dataInicio'],
					'ct' => $_POST['carteiraTrabalho'],
					'sexo'=> $_POST['sexo'],
					'cep'=> $_POST['cep'],
					'endereco'=> $_POST['endereco'],
					'numero'=> $_POST['numero'],
					'complemento'=> $_POST['complemento'],
					'bairro'=> $_POST['bairro'],
					'cidade'=> $_POST['cidade'],
					'estado'=> $_POST['estado'],
					'telefone'=> $_POST['telefoneFixo'],
					'celular'=> $_POST['telefoneCelular'],
					'status'=> $_POST['opcaoCadastral'],
					'login' => $_POST['login'],
					'senha' => $_POST['senha']);

				$inseridos = $time4bd->insert('personal',$personal);


				$retorno = $time4bd->fetchAll("SELECT * from `personal`ORDER BY nome");

				echo json_encode($retorno, JSON_PRETTY_PRINT); 
			}else{

				$idPersonal = $_POST['id'];

				$personal = array(
					'nome'=> $_POST['nomeCompleto'],
					'cpf'=> $_POST['cpf'],
					'rg'=> $_POST['rg'],
					'email'=> $_POST['email'],
					'nasc'=> $_POST['dataNascimento'],
					'nIns'=> $_POST['cref'],
					'dataInicio'=> $_POST['dataInicio'],
					'ct' => $_POST['carteiraTrabalho'],
					'sexo'=> $_POST['sexo'],
					'cep'=> $_POST['cep'],
					'endereco'=> $_POST['endereco'],
					'numero'=> $_POST['numero'],
					'complemento'=> $_POST['complemento'],
					'bairro'=> $_POST['bairro'],
					'cidade'=> $_POST['cidade'],
					'estado'=> $_POST['estado'],
					'telefone'=> $_POST['telefoneFixo'],
					'celular'=> $_POST['telefoneCelular'],
					'status'=> $_POST['opcaoCadastral'],
					'login' => $_POST['login'],
					'senha' => $_POST['senha']);

				$alterados = $time4bd->update("personal",$personal,"id=$idPersonal");


				$retorno = $time4bd->fetchAll("SELECT * from `personal`ORDER BY nome");

				echo json_encode($retorno, JSON_PRETTY_PRINT); 


			}

			break;

		case 'buscaFoto':

			$id = $_POST['id'];

			
			$foto = $time4bd->fetchAll("SELECT * FROM `fotoAluno` where idAluno = '$id' and status = 'personal'");
			foreach ($foto as $key => $temp) {
				$local = $temp->local;

				if ($local == 'antigo')
				{
					//echo 'antigo';
					foreach ($foto as $key => $temp) {
						$newArrData[$key]['idAluno'] = $temp->idAluno;
					    $newArrData[$key]['foto'] = base64_encode($temp->foto);
					    $newArrData[$key]['local'] = $temp->local;
					    $newArrData[$key]['status'] = $temp->status;
					}
					echo json_encode($newArrData, JSON_PRETTY_PRINT);
				}
				else
				{

					foreach ($foto as $key => $temp) {
						$newArrData[$key]['idAluno'] = $temp->idAluno;
					    $newArrData[$key]['foto'] = base64_encode($temp->foto);
					    $newArrData[$key]['local'] = $temp->local;
					    $newArrData[$key]['status'] = $temp->status;
					}
					echo json_encode($newArrData, JSON_PRETTY_PRINT);
					//echo $local;
					//echo json_encode($foto, JSON_PRETTY_PRINT);
				}

			}
			
			echo '';
			
			
			
			//foreach($foto as $key=>$value){
			//    $newArrData[$key] =  $spots[$key];
			//    $newArrData[$key]['idAluno'] = base64_encode($spots[$key]['picture']);
			//    $newArrData[$key]['foto'] = base64_encode($spots[$key]['thumbnail']);
			//}
			//header('Content-type: application/json');
			
			

			//echo $foto;
			

			break;
		
		default:

		//$retorno = $time4bd->fetchAll("SELECT * from `personal`ORDER BY id");
		//echo json_encode($retorno, JSON_PRETTY_PRINT); 
			
			break;
	}

			
			

	

?>