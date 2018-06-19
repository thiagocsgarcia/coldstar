<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-bd.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php


		//echo $_GET['codigoBio'];
		//echo $_GET['id'];



		if ($_GET['codigoBio'] != "null" and isset($_GET['id'])) {

			$codigoBio = $_GET['codigoBio'];
			$alunos = $time4bd->fetchAll("SELECT id, nome, cpf, rg, date_format(nasc, '%d/%m/%Y') as nasc, email, endereco, numero, cidade, celular, imagem, date_format(exame, '%d/%m/%Y') as exame, date_format(dataInicio, '%d/%m/%Y') as dataInicio FROM `alunos` where codigo  = '$codigoBio'");
		
		}elseif (isset($_GET['id']) and $_GET['codigoBio'] == "null") {

			$id = $_GET['id'];
			$alunos = $time4bd->fetchAll("SELECT id, nome, cpf, rg, date_format(nasc, '%d/%m/%Y') as nasc, email, endereco, numero, cidade, celular, imagem, date_format(exame, '%d/%m/%Y') as exame, date_format(dataInicio, '%d/%m/%Y') as dataInicio FROM `alunos` where id = '$id'");
		
		}



// Dar o include no arquivo consultar-sql.php e após, declarar a variável que executará o comando SQL



$meuAluno = "";
foreach ($alunos as $i => $aluno) {
	$meuAluno = $aluno;
}




?>

