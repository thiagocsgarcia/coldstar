<div class="row clearfix" role="main">
  <script src="scripts/editar-plano.js"></script>
	<div class="col-md-12" align="center">
	<h3 class="alert-info"> Editar Plano </h3>

		<input type="hidden" id="hidCodigo" value=<?php echo (isset($_GET['codigo']))?$_GET['codigo']:null;?> />
				<div class="row bg-warning" align="left" style="margin-bottom:2em; width:80%;">
	               
					 <label>Buscar: </label>
					 <input type="text">
					 
                     <a href="principal.php?acao=cadastra-conta-academia" style="float:right;" type="button" class="btn btn-success"><i class="mdi mdi-credit-card"></i> Nova Conta</a>
				 	 
				</div>

        <div id="divTablePlanos"></div>
			
    </div>
</div>