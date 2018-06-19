<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-bd.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php.


		

		$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 


		if ($_GET['codigoBio'] != "null" and isset($_GET['id'])) {


			$codigoBio = $_GET['codigoBio'];
			$entradas = $time4bd->fetchAll("SELECT codigoA, date_format(data, '%d/%m/%Y - %H:%i') as data, status FROM `entradas` where codigoA  = '$codigoBio' order by data desc limit 10");
		

		}elseif (isset($_GET['id']) and $_GET['codigoBio'] == "null") {
			

			$id = $_GET['id'];
			$entradas = $time4bd->fetchAll("SELECT codigoA, date_format(data, '%d/%m/%Y - %H:%i') as data, status FROM `entradas` where  aluno = '$id' order by data desc limit 10");
		

		}




$tabela = "";

foreach ($entradas as $i => $entrada) {
	$frequenciaAluno = $entrada;

	$tabela .= "<tr><td>".$frequenciaAluno->data."</td><td>".$frequenciaAluno->status."</td></tr>";

}



?>