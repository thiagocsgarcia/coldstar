
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
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">:: Administração <strong class="caret"></strong></a>
							<ul class="dropdown-menu">

								<li>
									<a href="principal.php?acao=compras-realizadas"><i class="glyphicon glyphicon-pushpin"></i> Compras Realizadas(Total)</a>
								</li>

								<li>
									<a href="principal.php?acao=dias"><i class="glyphicon glyphicon-calendar"></i> Dias </a>
								</li>

								<li>
									<a href="principal.php?acao=categorias"><i class="glyphicon glyphicon-leaf"></i> Gerenciar Categorias</a>
								</li>

																
								<li>
									<a href="principal.php?acao=produtos"><i class="glyphicon glyphicon-gift"></i> Gerenciar Produtos </a>
								</li>

								<li>
									<a href="principal.php?acao=entrada-produtos"><i class="glyphicon glyphicon-gift"></i> Entrada Produtos </a>
								</li>

								<li>
									<a href="principal.php?acao=fornecedores"><i class="glyphicon glyphicon-retweet"></i> Gerenciar Fornecedores </a>
								</li>

								

								<li>
									<a href="principal.php?acao=despesas"><i class="glyphicon glyphicon-usd"></i> Gerenciar Despesas </a>
								</li>


								

								<li class="divider"></li>

								<li>

								<li>
									<p><i class="mdi mdi-file"></i> Relatórios</p>									
								</li>

								<li>
									<a href="principal.php?acao=relatorio-alunos"><i class="mdi mdi-file"></i> Importar XML </a>									
								</li>								

							</ul>
						</li>
						

						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">:: Home <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="principal.php?acao=principal"><i class="mdi mdi-home"></i> Inicio</a>
								</li>

								<li>
									<a href="principal.php?acao=nova-compra"><i class="glyphicon glyphicon-shopping-cart"></i> Nova Compra</a>
								</li>

								<li>
									<a href="principal.php?acao=fechar-caixa"><i class="glyphicon glyphicon-piggy-bank"></i> Fechar Caixa </a>
								</li>

								<li class="divider"> GERENCIAR</li>

								

								<li>
									<a href="logout.php"><i class="glyphicon glyphicon-plane"></i> Sair  </a>
								</li>
							</ul>
						</li>

					</ul>
				</div>				
			</nav>
		</div>
	</div>
</header>