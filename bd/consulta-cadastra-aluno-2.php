<?php
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-bd.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php



		
		if(isset($_GET['rg'])) {
			$rg = $_GET['rg'];
			$alunos = $time4bd->fetchAll("SELECT id, nome, cpf, rg, date_format(nasc, '%d/%m/%Y') as nasc, email, endereco, numero, cidade, celular, imagem, date_format(exame, '%d/%m/%Y') as exame, date_format(dataInicio, '%d/%m/%Y') as dataInicio FROM `alunos` where rg  = '$rg'");
		}
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$alunos = $time4bd->fetchAll("SELECT id, nome, cpf, rg, date_format(nasc, '%d/%m/%Y') as nasc, email, endereco, numero, cidade, celular, imagem, date_format(exame, '%d/%m/%Y') as exame, date_format(dataInicio, '%d/%m/%Y') as dataInicio FROM `alunos` where id = '$id'");
		}



foreach ($alunos as $i => $aluno) {
	$meuAluno = $aluno;
}


?>