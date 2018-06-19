<?php

include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


			case 'carregarCategoria':
			
				$grupo = $time4bd->fetchAll("SELECT * from categorias order by descricao");
				
				echo json_encode($grupo, JSON_PRETTY_PRINT);

			break;



			case 'buscaCategoriaNome':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from categorias where nFantasia = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;



			case 'buscaCategoriaId':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from categorias where id = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;
			


			case 'cadastrarCategoria':

			$idCategoria = $_POST['idCategoria'];

					$categoria = array(									
										'descricao'=> $_POST['descricao'],						
										'dataCadastro'=> date("Y/m/d"),
										'codigoC' => $_POST['abreviacao']);

									

					if($_POST['idCategoria'] == ''){

						$inseridos = $time4bd->insert('categorias',$categoria);

						$retornar = $time4bd->fetchAll("SELECT * from categorias");
						echo json_encode($retornar, JSON_PRETTY_PRINT);

					}else{

						$atualizados = $time4bd->update("categorias",$categoria,"id=$idCategoria");
						

						$retornar = $time4bd->fetchAll("SELECT * from categorias");
						echo json_encode($retornar, JSON_PRETTY_PRINT);
					}					

			break;



			case 'deletarCategoria':

					$idCategoria = $_POST['idCategoria'];

					$deletados = $time4bd->delete("categorias","id=$idCategoria");



					$retornar = $time4bd->fetchAll("SELECT * from categorias");
					echo json_encode($retornar, JSON_PRETTY_PRINT);


			break;

	}



?>