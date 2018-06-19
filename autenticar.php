<?php
require('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
$config = new Zend_Config_Ini('bd/config.ini','database');
$time4bd = Zend_Db::factory($config->adapter,$config->params);
$time4bd->setFetchMode(Zend_Db::FETCH_OBJ);



	if($_POST['login'] == '' and $_POST['senha'] == '' ){

		header('LOCATION: index.php');

	}

	if($_POST['login'] == '' or $_POST['senha'] == '' ){

		header('LOCATION: index.php');

	}

		if($_POST['login'] == 'null' or $_POST['senha'] == 'null' ){

		header('LOCATION: index.php');

	}


	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//print $_POST['login']."<br />";
	//print  $_POST['senha']."<br />";

	$logado = '';
	$statusLogado = '';
	



	$retornoLogin = $time4bd->fetchAll("SELECT login, senha, status from personal where login = '$login' and senha = '$senha' ");

   //var_dump($retornoLogin);

	foreach ($retornoLogin as $i => $meuLogin) {

		$loginAtual = $meuLogin;	


			$logado = $loginAtual->login;
			$statusLogado = $loginAtual->status;

					
		
	}



	if($logado == ""){

		header('LOCATION: index.php');

	}else{

		$validador = $logado;
	}


    print $validador;


	if( $validador == $login){

			session_start("logado");

			$_SESSION["status"] = $statusLogado;
			$_SESSION["usuario"] = $logado;


		header('LOCATION: principal.php?acao=principal');

	}else{

		header('LOCATION: index.php');
	}




?>