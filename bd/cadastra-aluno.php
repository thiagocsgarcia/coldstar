<?php
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('../'));
require('Zend/Loader/Autoloader.php');
Zend_Loader_Autoloader::getInstance();
$config = new Zend_Config_Ini('bd/config.ini','database');
$time4bd = Zend_Db::factory($config->adapter,$config->params);


Zend_Db_Table_Abstract::setDefaultAdapter($time4bd);
require('classes/aluno.php');
require('bd/tabela-aluno.php');


//$id 				= $_POST['id'];
$nome 				= $_POST['nomeCompleto'];
$cpf 				= $_POST['cpf'];
$rg 				= $_POST['rg'];
$nascFormatoBrasil  = $_POST['dataNascimento'];
$email 				= $_POST['email'];
$sexo				= $_POST['sexo'];

//$nomeFiliacao 		= $_POST['nomeFiliacao'];
$endereco 			= $_POST['endereco'];
$numero 			= $_POST['numero'];
$complemento 		= $_POST['complemento'];
$cep 				= $_POST['cep'];
$bairro 			= $_POST['bairro'];
$cidade 			= $_POST['cidade'];
$estado 			= $_POST['estado'];
$celular 			= $_POST['telefoneCelular'];
$telefone 			= $_POST['telefoneFixo'];
//$imagem 			= $_POST['imagem'];
//$codigoBio 		= $_POST['codigoBio'];
//$codigoPlano 		= $_POST['codigoPlano'];
//$codigoSubPlano 	= $_POST['codigoSubPlano'];
//$codigoContrato 	= $_POST['codigoContrato'];
//$dataInicial 		= $_POST['dataInicial'];
//$matricula 		= $_POST['matricula'];

$grupoE 			= $_POST['grupoEspecial'];
$exameFormatoBrasil	= $_POST['dataExame'];
$status             = 'pre-cadastro';

//echo $exameFormatoBrasil;

//echo "teste".$exameFormatoBrasil;
//echo $cpf;

$dataInicio = date('Y-m-d H:i');

$dataExame = implode("-",array_reverse(explode("/",$exameFormatoBrasil)));
$dataNasc = implode("-",array_reverse(explode("/",$nascFormatoBrasil)));

$exame = $dataExame;

$nasc = $dataNasc;


//echo $exame."<br />";
//echo $nasc."<br />";




$meuAluno = new aluno($nome,$cpf,$rg,$nasc,$email,$sexo,$endereco,$numero,$complemento,$cep,$bairro,$cidade,$estado,$celular,$telefone,$grupoE,$exame,$dataInicio, $status);
//if(!empty($id)) $meuAluno->id = $id;
$meuAluno->salva();


echo json_encode($meuAluno);

//var_dump($meuAluno);


//header("LOCATION: ../principal.php?acao=cadastra-aluno2&rg=$rg");