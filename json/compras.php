<?php

include("conexao-bd-json.php");

date_default_timezone_set('America/Sao_Paulo');

	$opcao = $_POST['opcao'];
	

	switch ($opcao) {


		case 'carregaCompras':
		
			$grupo = $time4bd->fetchAll("SELECT * from compras order by id desc limit 15");
			
			echo json_encode($grupo, JSON_PRETTY_PRINT);

		break;



		case 'carregaListaDeCompras':

			$idCompra = $_POST['idCompra'];
		
			$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
			
			echo json_encode($proCompra, JSON_PRETTY_PRINT);

		break;



		case 'novaCompra':
	
			$dataRegistro = date("Y-m-d h:i:s");
			$vendedor = $_POST["usuario"];
		
			$compra = array(	
							'data'=> $dataRegistro,						
							'vendedor'=> $vendedor
							);					

					

						$inseridos = $time4bd->insert('compras',$compra);

						
						$compraAtual = $time4bd->fetchAll("SELECT * from compras where data = '$dataRegistro' and vendedor = '$vendedor' ");

						echo json_encode($compraAtual, JSON_PRETTY_PRINT);
						

		break;



		case 'carregaProdutosParaCompra':

			$busca = $_POST['busca'];
		
			$proCompra = $time4bd->fetchAll("SELECT * from produtos where codBarras = '$busca' or descricao like '%$busca%' ");
			
			echo json_encode($proCompra, JSON_PRETTY_PRINT);

		break;



		case 'registraProduto':

			$idCompra = $_POST['idCompra'];
			$codBarras = $_POST['codBarras'];

			$buscaProduto = $time4bd->fetchAll("SELECT * from produtos where codBarras = '$codBarras' ");


			foreach ($buscaProduto as $i => $produto) {
				
				$produtoAtual = $produto;

				$codigoPr = $codBarras;
				$data = date("Y-m-d h:i:s");
				$quantidade = '1';
				$estoque = $produtoAtual->estoque - 1;
				$valor = $produtoAtual->preco;
				//$total =
				$ct = $produtoAtual->ct;
				$ncm = $produtoAtual->ncm;
				$descricao = $produtoAtual->descricao;

				//$codigoProduto =
				//$codigoDia = 
				//$desconto =

				$produtoComprado = array(
							'codigo'=> $idCompra,	
							'codigoPr'=> $codigoPr,						
							'data'=> $data,
							'quantidade'=> $quantidade,
							'valor'=> $valor,
							'total' => $valor,
							'ct'=> $ct,
							'ncm'=> $ncm,
							'descricao'=> $descricao
							);					

					

						$inseridos = $time4bd->insert('procompras',$produtoComprado);



				$produtoAlterado = array(
							'estoque'=> $estoque
							);	


						$atualizados = $time4bd->update("produtos",$produtoAlterado,"codBarras='$codigoPr'");

			}



		
			$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
			
			echo json_encode($proCompra, JSON_PRETTY_PRINT);

		break;

	

		case 'deletarProdutoCarrinho':


						$idCompra = $_POST['idCompra'];
						$idProduto = $_POST['idProduto'];

						$deletados = $time4bd->delete("procompras","id=$idProduto");


						$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
						echo json_encode($proCompra, JSON_PRETTY_PRINT);


		break;



		case 'atualizaQuantidadePreco':


						$idCompra = $_POST['idCompra'];
						$idProduto = $_POST['idProduto'];
						$quantidade = $_POST['quantidade'];
						$valorTotal = $_POST['valorTotal'];



						$produtoAlterado = array(
							'quantidade'=> $quantidade,							
							'total'=> $valorTotal
							);	


						$atualizados = $time4bd->update("procompras",$produtoAlterado,"id='$idProduto'");


						$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
						echo json_encode($proCompra, JSON_PRETTY_PRINT);


		break;





		case 'atualizaDescontoPreco':


						$idCompra = $_POST['idCompra'];
						$idProduto = $_POST['idProduto'];
						$desconto = $_POST['desconto'];
						$quantidade = $_POST['quantidade'];
						$valorTotal = $_POST['valorTotal'];



						$produtoAlterado = array(
							'desconto'=> $desconto,
							'quantidade'=> $quantidade,							
							'total'=> $valorTotal
							);	


						$atualizados = $time4bd->update("procompras",$produtoAlterado,"id='$idProduto'");


						$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
						echo json_encode($proCompra, JSON_PRETTY_PRINT);


		break;






		case 'atualizaFormaPagto':

		$idCompra = $_POST['idCompra'];
		$formaPagto = $_POST['formaPagto'];
		$totalParcelas = $_POST['totalParcelas'];
		$valorPago = $_POST['valorPago'];
		//$vendedor = $_POST['vendedor'];

		$valorParcela = $valorPago / $totalParcelas;



		for ($i=1; $i <= $totalParcelas ; $i++) { 
			

			$inserePagto = array(
						'codigo' => $idCompra,
						'parcela' => $i,
						'tparcela' => $totalParcelas,
						'data' => date("Y-m-d h:i"),
						'vencimento' => date("Y-m-d h:i"),
						'valor' => $valorParcela,											
						'formaDesc' => $formaPagto
						);	


					$Inseridos = $time4bd->insert("pagamentos",$inserePagto);
		}




		$incluirFormaCompra = array(													
							'data' => date("Y-m-d h:i"),
							$formaPagto => $valorPago
							);	


						$atualizados = $time4bd->update("compras",$incluirFormaCompra,"id='$idCompra'");





			$proCompra = $time4bd->fetchAll("SELECT * from pagamentos where codigo = '$idCompra' ");
			echo json_encode($proCompra, JSON_PRETTY_PRINT);

		break;






		case 'FinalizaCompra':

		$idCompra = $_POST['idCompra'];
		$vendedor = $_POST['usuario'];

		$descontoCompra = $_POST['descontoCompra'];
		$troco = $_POST['troco'];
		$quantidadeItens = $_POST['quantidadeItens'];
		$valorTotalCompra = $_POST['valorTotalCompra'];
		


		$formaAlterada = array(													
							'data' => date("Y-m-d h:i"),
							'status' => 'finalizada',
							'desconto' => $descontoCompra,
							'troco' => $troco,
							'qtdItens' => $quantidadeItens,
							'valor' => $valorTotalCompra,
							'caixa' => $vendedor
							);	


						$atualizados = $time4bd->update("compras",$formaAlterada,"id='$idCompra'");

						$proCompra = $time4bd->fetchAll("SELECT * from procompras where codigo = '$idCompra' ");
						echo json_encode($proCompra, JSON_PRETTY_PRINT);

		break;



		case 'calculaDescontoCompra':

			$idCompra = $_POST['idCompra'];
			$valorDescontoCompra = $_POST['valorDescontoCompra'];



			$buscaDescontoCompra = $time4bd->fetchAll("SELECT desconto from compras where id = '$idCompra' ");

			$descontoCompra = $buscaDescontoCompra[0]->desconto + $valorDescontoCompra;
		


			$descontoAlterado = array(													
							'desconto' => '$descontoCompra'
							);	


					$atualizados = $time4bd->update("compras",$descontoAlterado,"id='$idCompra'");

					$Compra = $time4bd->fetchAll("SELECT * from compras where codigo = '$idCompra' ");
					echo json_encode($compra, JSON_PRETTY_PRINT);

		break;



	}




?>