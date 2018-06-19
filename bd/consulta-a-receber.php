<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-sql.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php




		$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 

		//$codigoBio = $_GET['codigoBio'];


			$porReceber = $time4bd->fetchAll("SELECT alunos.nome, areceber.descricao, areceber.valor, date_format(areceber.vencimento, '%d-%m-%Y') as vencimento, areceber.parcela, areceber.tparcela, areceber.diaPago, areceber.valorPago FROM areceber, alunos where areceber.codigoAluno = alunos.id and areceber.vencimento >= curdate() order by areceber.vencimento limit 20"); 
		
		



$tabelaReceber = "";


foreach ($porReceber as $i => $linha) {
	$recebeAluno = $linha;

	$tabelaReceber .= "<tr>
							<td>".$recebeAluno->nome."</td>
							<td>".$recebeAluno->descricao."</td>
							<td>".$recebeAluno->valor."</td>
							<td>".$recebeAluno->vencimento."</td>
							<td>".$recebeAluno->parcela."/".$recebeAluno->tparcela."</td>
							<td>".$recebeAluno->diaPago."</td>
							<td>".$recebeAluno->valorPago."</td>
							<td><a class='btn btn-mini btn-danger' href='#'' role='button'><i class='mdi mdi-account-plus'></i>  Baixa Manual  </a></td>
							<td><a class='btn btn-mini btn-warning' href='#'' role='button'><i class='mdi mdi-account-plus'></i>  INFO  </a></td>

						</tr>";

}



?>