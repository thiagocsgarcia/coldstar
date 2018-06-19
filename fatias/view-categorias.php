<script src="scripts/categorias.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerenciar Categorias</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> GERENCIAR CATEGORIAS </h3>		

	

			<div class="col-md-4 bg-success">	

				<h3 class="bg-black-fosco"> Nova Categoria</h3>

					<div class="form-group">
							<label for="txtId"> ID </label>
							<input type="text" class="form-control" id="txtId" placeholder="Identificador" disabled="disabled">

						</div>
					
					<div class="form-group">

						<label for="txtAbreviacao"> Abreviação da nova Categoria </label>
						<input type="text" maxlength="4" size="4" class="form-control" id="txtAbreviacao" placeholder="Digite a Abreviação">
					</div>

					<div class="form-group">
						<label for="txtdescricao"> Descrição da nova Categoria </label>
						<input type="text" class="form-control" id="txtdescricao" placeholder="Digite a Descrição">

					</div>


					<button class="btn btn-sm btn-success btn-block" onclick="inserirCategoria()"> Salvar </button>  
					<button class="btn btn-sm btn-danger btn-block"> Cancelar </button>


				
			</div>

			

			<div class="col-md-8">

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> id </td>
						<td> Descrição </td>
						<td> Abreviação </td>
						<td> Data </td>
						<td>  Ações </td>

					</thead>
					<tbody align="center" id='tabelaCategorias'>
						
					</tbody>

				</table>

			</div>

			<div class="col-md-4">

			</div>

			
	<div class="col-md-12">

		<br />

	</div>

	</div>

