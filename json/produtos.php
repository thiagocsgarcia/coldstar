<?php

include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


			case 'carregarProdutos':
			
				$grupo = $time4bd->fetchAll("SELECT * from produtos order by descricao");
				
				echo json_encode($grupo, JSON_PRETTY_PRINT);

			break;



			case 'buscaProdutosNome':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from produtos where descricao like '%$busca%' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;


			case 'buscaProdutosId':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from produtos where id = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;


			case 'buscaProdutosCodBarras':

				$busca = $_POST['busca'];

				$pesquisa = $time4bd->fetchAll("SELECT * from produtos where codBarras = '$busca' ");
				echo json_encode($pesquisa, JSON_PRETTY_PRINT);

			break;



			case 'cadastrarProdutos':

			$idProduto = $_POST['id'];

					$produtos = array(	
										'codBarras'=> $_POST['codBarras'],						
										'descricao'=> $_POST['descricao'],
										'categoria' => $_POST['categoria'],
										'fornecedor'=> $_POST['fornecedor'],
										'custoI'=> $_POST['custoI'],
										'estoque'=> $_POST['estoque'],
										'custo'=> $_POST['custoF'],
										//'controle'=> $_POST['controle'],
										//'codImp'=> $_POST['codImp'],
										//'codigo'=> $_POST['codigo'],
										'dataCadastrado'=> date('Y/m/d'),
										'preco'=> $_POST['preco'],																									
										'custoI'=> $_POST['custoI'],										
										'ct'=> $_POST['ct'],
										'ncm'=> $_POST['ncm']
										//'obs'=> $_POST['obs'],
										/*'balanca'=> $_POST['balanca']*/);

					

					if($_POST['id'] == ''){

						$inseridos = $time4bd->insert('produtos',$produtos);

						$retornar = $time4bd->fetchAll("SELECT * from produtos");
						echo json_encode($retornar, JSON_PRETTY_PRINT);

					}else{

						$atualizados = $time4bd->update("produtos",$produtos,"id='$idProduto'");

						$retornar = $time4bd->fetchAll("SELECT * from produtos");
						echo json_encode($retornar, JSON_PRETTY_PRINT);
					}					

			break;



			case 'deletarProdutos':

					$idProduto = $_POST['idProduto'];

					$deletados = $time4bd->delete("produtos","id=$idProduto");


					$retornar = $time4bd->fetchAll("SELECT * from produtos");
					echo json_encode($retornar, JSON_PRETTY_PRINT);


			break;



			



	}



?>