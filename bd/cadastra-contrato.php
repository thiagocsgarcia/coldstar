<?php

echo "aluno: ".$_POST['aluno']."<br />";
echo "plano: ".$_POST['plano']."<br />";
echo "subPlano: ".$_POST['subPlano']."<br />";
echo "valorMensal: ".$_POST['valorMensal']."<br />";
echo "totalMatricula: ".$_POST['totalMatricula']."<br />";
echo "txaPlano: ".$_POST['txaPlano']."<br />";
echo "diaPagto: ".$_POST['diaPagto']."<br />";
echo "cobraAcrescimo: ".$_POST['cobraAcrescimo']."<br />";
echo "formaPagamento: ".$_POST['formaPagamento']."<br />";
echo "txtTotal: ".$_POST['txtTotal']."<br />";


$contrato = array(
	'aluno'=> $_POST['plano'],
	'plano'=> $_POST['subPlano'],
	'subPLano'=> $_POST['valorMensal']);

//var_dump($contrato);

//$inseridos = $cdcol->insert('cds',$cd);

if($inseridos > 0) header("LOCATION ../principal.php?opcao=cadastro-aluno-finaliza");
else print '<p> >> ERRO !! CONTATE O ADMINISTRADOR !!! << </p>';


?>