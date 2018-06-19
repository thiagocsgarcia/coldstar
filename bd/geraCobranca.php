<?php
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('../'));
require('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
$config = new Zend_Config_Ini('bd/config.ini','database');
$time4bd = Zend_Db::factory($config->adapter,$config->params);
$time4bd->setFetchMode(Zend_Db::FETCH_OBJ); 


$aluno = $_GET['aluno'];
$contratos = $time4bd->fetchAll("SELECT * FROM `contratos` where aluno  = '$aluno' order by id desc limit 1");

/*for ($i=0; $i <= $contratoAtual->parcelas ; $i++) { 
	

$mes = date($contratoAtual->id);


}*/




foreach ($contratos as $cont => $contratoAtual) {
	



		
	$dataInicial = strtotime($contratoAtual->dataInicio);
	$dia = date("d", $dataInicial);
	$mes = date("m", $dataInicial);
	$ano = date("Y", $dataInicial);
	$data = null;

	$i = null;

	//esse for dá o giro de gravação no banco gerando parcelas conforme a quantidade estipulada no campo $contratoAtual->parcelas
	for ($i=1; $i <= $contratoAtual->parcelas ; $i++) { 
	
		
		//rotina que define se o valor da parcela é o da primeira parcela, a qual embute preços de matricula e taxas ou se é só valor de mensalidade.
		//TAMBÉM FAZ O CALCULO DAS DATAS DE VENCIMENTO .... MITEI NESSA PARADA AQUI !!!!
		if($i == 1){

			$valor = $contratoAtual->valorTotalMatricula;
			$descricao = 'Mensalidade + Matricula';


			$data = $ano."-".$mes."-".$contratoAtual->diaPagto;

		}else{
			

			$valor = $contratoAtual->valorMensal;
			$descricao = 'Mensalidade';	


				if ($mes == 12) {					
					$mes = 1;
					$ano = $ano + 1;
					$data = $ano."-".$mes."-".$contratoAtual->diaPagto;
					
				}else{
					$mes = $mes + 1;
					$data = $ano."-".$mes."-".$contratoAtual->diaPagto;
				}

		}


		if($i == $contratoAtual->parcelas){

			$valor = $contratoAtual->valorMensal + $contratoAtual->taxaPlano;
			$descricao = 'Mensalidade + Taxa do Plano';

			}

		

		switch ($contratoAtual->formaPagto) {
			case 'bl':
				$status = 'pendente';
				break;

			case 'cc':
				$status = 'pago';
				break;

			case 'ch':
				$status = 'pago';
				break;

			case 'cd':
				$status = '´pago';
				break;
			
			default:
				
				break;
		}

		
			
		$contrato = array(
			'codigoContrato'=> $contratoAtual->id,
			'codigoAluno'=> $_GET['aluno'],
			'valor'=> $valor,
			'descricao'=> $descricao,
			'formaPagto'=> $contratoAtual->formaPagto,
			'Parcela'=> $i,
			'tParcela'=> $contratoAtual->parcelas,
			'vencimento'=> $data,
			'dataCadastro'=> date('Y/m/d'),
			//'desconto'=> $_POST['cobraAcrescimo'],
			'nossoNumero'=> 'fase de implementação',
			//'modoPagto'=> $_POST['txtTotal'],
			'status'=> $status);


			//var_dump($contrato);
			//echo "<br /> <br /> <br />";

			$inseridos = $time4bd->insert('areceber',$contrato);

	}


}


if($inseridos > 0) header("LOCATION: ../principal.php?acao=cadastra-aluno-3&id=".$_GET['aluno']."&contrato=".$contratoAtual->id);
else print '<p> >> ERRO !! CONTATE O ADMINISTRADOR !!! << </p>';

?>