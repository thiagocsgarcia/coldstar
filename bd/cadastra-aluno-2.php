<?php 
// OS PARAMETROS DE CONEXÃO ENCONTRAM-SE NO ARQUIVO consultar-sql.php LOCALIZADO NESTA PASTA E ENCONTRA-SE INSTANCIADO NA PAGINA principal.php



$cpf = $_GET['cpf'];


$alunos = $time4bd->fetchAll("SELECT id, nome, cpf, rg, date_format(nasc, '%d/%m/%Y') as nasc, email, endereco, numero, cidade, celular, imagem, date_format(exame, '%d/%m/%Y') as exame, date_format(dataInicio, '%d/%m/%Y') as dataInicio FROM `alunos` where cpf  = '$cpf'");

$planos = $time4bd->fetchall("select * from plano where plano = $plano")

$aluno = 	$alunos->id;

$plano = 	$_POST['plano'];
$subPlano = $_POST['subPlano'];
$planos = $time4bd->fetchall("select * from plano where plano = $plano")


$dataInicio = $dataInicio = date('Y-m-d H:i');
$dataFinal = $dataInicio + $subplano;

$valorMatricula = $planos->pMatricula;
$valorTxa = $planos->pMatricula;
$diaPagamento = 



//insert aluno, plano, subplano, dataInicio, dataFinal, valorMatricula, valorTxa, diaPagamento, forma, parcelas, status, vmensal into contratos values('')

>?