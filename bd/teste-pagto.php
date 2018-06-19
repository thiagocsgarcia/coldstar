<?php
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('../'));
require('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
$config = new Zend_Config_Ini('bd/config.ini','database');
$time4bd = Zend_Db::factory($config->adapter,$config->params);
$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 

echo "aluno: ".$_POST['aluno']."<br />";
echo "plano: ".$_POST['plano']."<br />";
echo "subPlano: ".$_POST['subPlano']."<br />";
echo "valorMensal: ".$_POST['valorMensal']."<br />";
echo "Matricula: ".$_POST['totalMatricula']."<br />";
echo "txaPlano: ".$_POST['txaPlano']."<br />";
echo "diaPagto: ".$_POST['diaPagto']."<br />";
echo "cobraAcrescimo: ".$_POST['cobraAcrescimo']."<br />";
echo "formaPagamento: ".$_POST['formaPagamento']."<br />";
echo "txtTotal: ".$_POST['txtTotal']."<br />";





//setando a variável da data do contrato



/*
if($inseridos > 0) header("LOCATION: ../principal.php?acao=cadastra-aluno-3&id=".$_POST['aluno']);
else print '<p> >> ERRO !! CONTATE O ADMINISTRADOR !!! << </p>';  */



?>