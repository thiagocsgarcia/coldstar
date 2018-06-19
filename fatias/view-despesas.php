<script src="scripts/gerencia-alunos.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> GERENCIAR DESPESAS </h3>		

	

			<div class="col-md-4 bg-success">	

				<h3 class="bg-black-fosco"> Nova Despesa</h3>

					<div class="form-group">
						<label for="txtId"> ID </label>
						<input type="text" class="form-control" id="txtId" placeholder="Identificador" disabled="disabled">

					</div>					
					

					<div class="form-group">
						<label for="txtdescricao"> Descrição da nova Despesa </label>
						<input type="text" class="form-control" id="txtdescricaoDespesa" placeholder="Digite a Descrição">

					</div>


					<button class="btn btn-sm btn-success btn-block"> Salvar </button>  
					<button class="btn btn-sm btn-danger btn-block"> Cancelar </button>


				
			</div>

			

			<div class="col-md-8">				

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> id </td>
						<td> Descrição </td>
						<td>  Ações </td>

					</thead>
					<tbody align="center">
						<tr>
							<td> 1 </td>
							<td> Salários </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar </button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>

						</tr>
						<tr>
							<td> 2 </td>
							<td> Água </td>							
							<td> <button class="btn btn-sm btn-warning"> Alterar</button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>

						<tr>
							<td> 3 </td>
							<td> Luz </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar </button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>

						<tr>
							<td> 4 </td>
							<td> Manutenção </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar </button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>

						<tr>
							<td> 2 </td>
							<td> Material de limpeza </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar</button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>

						<tr>
							<td> 3 </td>
							<td> ALBUMINA TABLETES </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar </button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>

						<tr>
							<td> 4 </td>
							<td> AMINO LIQUIDO </td>
							<td> <button class="btn btn-sm btn-warning"> Alterar </button>  <button class="btn btn-sm btn-danger"> Excluir </button> </td>
						</tr>
					</tbody>

				</table>

			</div>

			<div class="col-md-4">

			</div>

			
	<div class="col-md-12">

		<br />

	</div>

	</div>

