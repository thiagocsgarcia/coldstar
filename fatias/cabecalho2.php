<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Time4Fit - sua hora para treinar </title>

	

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.1.34/css/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="style/estilos.css">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
	<script type="text/javascript" src="scripts/highslide/highslide-full.js"></script>
	<link rel="stylesheet" type="text/css" href="scripts/highslide/highslide.css" />
    

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/jquery-ui.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	

	<script src="scripts/cabecalho.js"></script>
	<script src="scripts/mascara.js"></script>
	<script src="scripts/Chart.min.js"></script>


	<!--<script type="text/javascript" src="js/stack-2.js"></script>
	<script type="text/javascript" src="js/jquery.jqDock.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var jqDockOpts = {align: 'right', duration: 200, labels: 'tc', size: 48, distance: 85};
			$('#jqDock').jqDock(jqDockOpts);
		});
	</script>-->

	


</head>
<body>


<header class="row clearfix" align="right">
		

	<div class="col-md-12 bg-black-fosco" align="center">


		<a href="principal.php?acao=principal">
			<img src="images/logo.png" width="300" />
			<img src="images/logo-principal.gif" width="500" />
		</a>

		<h4 class="alert-info">
					:: T4F ::
		</h4>
		<!--?php print "<h6>Logado como ".$_SESSION["status"]. " - " .$_SESSION["usuario"]."</h6>"; ?-->	
	</div>


	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="javascript:window.history.go(-1)">  VOLTAR </a>
				</div>
				
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">					
					<form class="navbar-form navbar-left" role="search">
						
						<div class="form-group">
							
								<button type="button" class="btn btn-danger" onclick="botaoVermelho('botaoVermelho')"> Liberar Visitante </button>
								<input type="hidden" id="hidUsuario" value=<?php echo $_SESSION["usuario"];?> >

								<?php print "Logado como ".$_SESSION["status"]. " - " .$_SESSION["usuario"]; ?>	
													
						</div> 		


					</form>

					

					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">:: Home <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"><i class="glyphicon glyphicon-credit-card"></i> Loja</a>
								</li>

								<li>
									<a href="sincronizar.php"><i class="glyphicon glyphicon-transfer"></i> Sincronizar Servidor Externo</a>
								</li>

								<li>
									<a href="principal.php?acao=entrada"><i class="glyphicon glyphicon-map-marker"></i> Entrada - Academia </a>
								</li>

								<li>
									<a href="principal.php?acao=entrada-treino"><i class="glyphicon glyphicon-map-marker"></i> Entrada - Treino </a>
								</li>

								<li>
									<a href="principal.php?acao=gerencia-alunos"><i class="glyphicon glyphicon-user"></i> Gerenciar Alunos</a>
								</li>

								<li>
									<a href="principal.php?acao=treinos"><i class="mdi mdi-human"></i> Treinos </a>
								</li>

								<li>
									<a href="#"><i class="glyphicon glyphicon-paperclip"></i> Gerenciar Pré-Cadastro</a>
								</li>								
								

								<li class="divider"></li>

								<li>
									<a href="logout.php"><i class="mdi mdi-quit"></i> Sair  </a>
								</li>
							</ul>
						</li>

					</ul>
				</div>				
			</nav>
		</div>
	</div>
</header>