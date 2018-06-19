<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-sql.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php




		//$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 

		//$codigoBio = $_GET['codigoBio'];

		if ($_GET['codigoBio'] != "null" and isset($_GET['id'])) {
			$codigoBio = $_GET['codigoBio'];


			$contratos = $time4bd->fetchAll("SELECT id, plano, subPlano, date_format(dataInicio, '%d/%m/%Y') as dataInicio, DATE_FORMAT(dataFinal, '%d/%c/%Y') as dataFinal, TIMESTAMPDIFF(MONTH,dataInicio + INTERVAL TIMESTAMPDIFF(YEAR,dataInicio,dataFinal) YEAR, dataFinal) AS meses, status FROM `contratos` where aluno = '$codigoBio' order by dataInicio desc limit 15"); 
		
		}elseif (isset($_GET['id']) and $_GET['codigoBio'] == "null") {
		

			$id = $_GET['id']; 

			$contratos = $time4bd->fetchAll("SELECT id, codigo, plano, subPlano, date_format(dataInicio, '%d/%m/%Y') as dataInicio, DATE_FORMAT(dataFinal, '%d/%c/%Y') as dataFinal, TIMESTAMPDIFF(MONTH,dataInicio + INTERVAL TIMESTAMPDIFF(YEAR,dataInicio,dataFinal) YEAR, dataFinal) AS meses, status FROM `contratos` where aluno = '$id' order by dataInicio desc limit 15");
		}




$tabelaContrato = "";
$contratoAluno = "";

foreach ($contratos as $i => $contrato) {
	$contratoAluno = $contrato;

	$tabelaContrato .= "<tr>
							<td>".$contratoAluno->id."</td>
							<td>".$contratoAluno->plano."</td>
							<td>".$contratoAluno->subPlano."</td>
							<td>".$contratoAluno->dataInicio."</td>
							<td>".$contratoAluno->dataFinal."</td>
							<td>".$contratoAluno->status."</td>

						</tr>";

}



?>