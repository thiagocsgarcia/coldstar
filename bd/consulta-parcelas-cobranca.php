<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-sql.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php
		include("../jason/conexao-bd-json.php");



		//$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 

		if (isset($_POST['contrato'])) {
			$contrato = $_POST['contrato'];
		}else{
			$contrato = $contratoAluno->id;
			//echo $contrato;
		}

		$id = $_POST['id'];
			

		


$parcelas = $time4bd->fetchAll("SELECT parcela, tparcela, codigoContrato, descricao, date_format(vencimento, '%d/%m/%Y') as vencimento, valor, formaPagto, status from areceber where codigoAluno = '$id' and codigoContrato = '$contrato' order by id ");



$tabelaParcelas = "";
$tabelaParcelas2 = "";
$parcelaAluno = "";

foreach ($parcelas as $i => $parcela) {
	$parcelaAluno = $parcela;

	$tabelaParcelas .= "<tr>
							<td>".$parcelaAluno->parcela."</td>							
							<td>".$parcelaAluno->descricao."</td>
							<td>".$parcelaAluno->vencimento."</td>
							<td>".$parcelaAluno->valor."</td>
							<td>".$parcelaAluno->formaPagto."</td>	
						</tr>";

	$tabelaParcelas2 .= "<tr>
							<td>".$parcelaAluno->parcela."</td>
							<td>".$parcelaAluno->codigoContrato."</td>
							<td>".$parcelaAluno->descricao."</td>
							<td>".$parcelaAluno->vencimento."</td>
							<td>".$parcelaAluno->valor."</td>
							<td>".$parcelaAluno->formaPagto."</td>
							<td>".$parcelaAluno->status."</td>
							<td><a class='btn btn-sm btn-danger' href='#' 'role='button'><i class='mdi mdi-account-plus'></i>  Gerar Boleto de Pagamento  </a></td>
							<td><a class='btn btn-sm btn-warning' href='#' 'role='button' data-toggle='modal' data-target='#modalPagar'><i class='mdi mdi-account-plus'></i>  Baixa Manual  </a></td>													
						</tr>";


}

	echo $tabelaParcelas;

?>