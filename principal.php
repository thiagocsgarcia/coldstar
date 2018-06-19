<?php

        session_start();               

        	//print "logado como ".$_SESSION["status"]. " - " .$_SESSION["usuario"];

        if(!$_SESSION["status"]){
        	header("LOCATION: index.php");
        }
    ?>


<?php
	include("bd/consultar-sql.php");

	if($_SESSION["status"] == 'administrador'){

		include('fatias/cabecalho.php');
	}else{
		include('fatias/cabecalho2.php');
	}

	//include('fatias/menu-lateral-2.php');
?>


<!-- <div id="divMain" style="display:none; margin-bottom:1em; margin-top:1em;" align="center"> -->
	<?php

		$acao = (isset($_GET['acao']))?$_GET['acao']:null;
		

		switch($acao){

			case 'principal':
				include("fatias/view-principal.php");
				break;

			case 'categorias':
				include("fatias/view-categorias.php");
				break;

			case 'despesas':
				include("fatias/view-despesas.php");
				break;

			case 'fornecedores':
				include("fatias/view-fornecedores.php");
				break;

			case 'nova-compra':
				include("fatias/view-nova-compra.php");
				break;

			case 'produtos':
				include("fatias/view-produtos.php");
				break;

			case 'entrada-produtos':
				include("fatias/view-entrada-produtos.php");
				break;

			case 'fechar-caixa':
				include("fatias/view-fechamento-caixa.php");
				break;

			case 'dias':
				include("fatias/view-dias.php");
				break;

			

			

			default:
				header("LOCATION: principal.php?acao=principal");
		}
	?>

<!-- /div -->
<!-- </div> -->

<?php
	include('fatias/rodape.php');
?>