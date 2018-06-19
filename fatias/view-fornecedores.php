<script src="scripts/fornecedores.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> GERENCIAR FORNECEDORES </h3>		

	

			
			<div class="col-md-6 bg-success">
				<div class="col-md-6">	

					<h3 class="bg-black-fosco"> Dados Cadastrais</h3>					
						
						<div class="form-group">
							<label for="txtId"> ID </label>
							<input type="text" class="form-control" id="txtId" placeholder="Identificador" disabled="disabled">

						</div>

						<div class="form-group">
							<label for="txtCpf"> CPF </label>
							<input type="text" class="form-control" id="txtCpf" placeholder="Digite CPF">

						</div>

						<div class="form-group">
							<label for="txtRg"> RG </label>
							<input type="text" class="form-control" id="txtRg" placeholder="Digite RG">

						</div>

						<div class="form-group">
							<label for="txtCnpj"> CNPJ </label>
							<input type="text" class="form-control" id="txtCnpj" placeholder="Digite CNPJ">

						</div>

						<div class="form-group">
							<label for="txtInscricaoEstadual"> Inscrição Estadual </label>
							<input type="text" class="form-control" id="txtInscricaoEstadual" placeholder="Digite Inscrição Estadual">

						</div>

						<div class="form-group">
							<label for="txtTipoC"> Tipo C </label>
							<input type="text" class="form-control" id="txtTipoC" placeholder="Digite TipoC">

						</div>

						<div class="form-group">
							<label for="txtRazaoSocial"> Razão Social </label>
							<input type="text" class="form-control" id="txtRazaoSocial" placeholder="Digite Razão Social">

						</div>

						<div class="form-group">
							<label for="txtNomeFantasia"> Nome Fantasia </label>
							<input type="text" class="form-control" id="txtNomeFantasia" placeholder="Digite Nome Fantasia">

						</div>

						<div class="form-group">
							<label for="txtCep"> CEP </label>
							<input type="text" class="form-control" id="txtCep" placeholder="Digite CEP">

						</div>

						<div class="form-group">
							<label for="txtEndereco"> Endereço </label>
							<input type="text" class="form-control" id="txtEndereco" placeholder="Digite Endereço">

						</div>

						<div class="form-group">
							<label for="txtNumero"> Número </label>
							<input type="text" class="form-control" id="txtNumero" placeholder="Digite Número">

						</div>

						<div class="form-group">
							<label for="txtComplemento"> Complemento </label>
							<input type="text" class="form-control" id="txtComplemento" placeholder="Digite Complemento">

						</div>

						<div class="form-group">
							<label for="txtBairro"> Bairro </label>
							<input type="text" class="form-control" id="txtBairro" placeholder="Digite Bairro">

						</div>

						<div class="form-group">
							<label for="txtCidade"> Cidade </label>
							<input type="text" class="form-control" id="txtCidade" placeholder="Digite Cidade">

						</div>

						<div class="form-group">
							<label for="txtUf"> UF </label>
							<input type="text" class="form-control" id="txtUf" placeholder="Digite UF">

						</div>


					
				</div>

				<div class="col-md-6">	

					<h3 class="bg-black-fosco"> Informações de Contato</h3>					
						

						<div class="form-group">
							<label for="txtEmail"> Email </label>
							<input type="text" class="form-control" id="txtEmail" placeholder="Digite E-mail">

						</div>

						<div class="form-group">
							<label for="txtContato"> Contato </label>
							<input type="text" class="form-control" id="txtContato" placeholder="Digite Contato">

						</div>

						<div class="form-group">
							<label for="txtTelefoneFixo"> Telefone Fixo </label>
							<input type="text" class="form-control" id="txtTelefoneFixo" placeholder="Digite Telefone Fixo">

						</div>

						<div class="form-group">
							<label for="txtCelular"> Celular </label>
							<input type="text" class="form-control" id="txtCelular" placeholder="Digite Celular">

						</div>

						<div class="form-group">
							<label for="txtOutros"> Outros </label>
							<input type="text" class="form-control" id="txtOutros" placeholder="Digite Outros">

						</div>

						<div class="form-group">
							<label for="txtSite"> Site </label>
							<input type="text" class="form-control" id="txtSite" placeholder="Digite Site">

						</div>

						<div class="form-group">
							<label for="txtSt"> ST </label>
							<input type="text" class="form-control" id="txtSt" placeholder="Digite ST">

						</div>

						<div class="form-group">
							<label for="txtIpi"> IPI </label>
							<input type="text" class="form-control" id="txtIpi" placeholder="Digite IPI">

						</div>

						<div class="form-group">
							<label for="txtIcms"> ICMS </label>
							<input type="text" class="form-control" id="txtIcms" placeholder="Digite ICMS">

						</div>


						<button class="btn btn-sm btn-success btn-block" onclick="inserirFornecedor()"> Salvar </button>  
						<button class="btn btn-sm btn-danger btn-block" onclick="limparCaixas()"> Limpar </button>


					
				</div>
			</div>

			
			


			<div class="col-md-6">

				<div class="form-group bg-success">

					<label for="txtPesquisaFornecedor"> Pesquisar Fornecedor</label>
					<input type="text" class="form-control" id="txtPesquisaFornecedor">

				</div>

				<h2 class="vermelho-laranja" align="center"> Total de Fornecedores: <b id='totalFornecedores'> </b> </h2>

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> CNPJ </td>
						<td> Nome Fantasia </td>
						<td colspan="2">  Ações </td>

					</thead>
					<tbody align="center" id='tabelaFornecedores'>
						

					</tbody>

				</table>

			</div>

			<div class="col-md-4">

			</div>

			
	<div class="col-md-12">

		<br />

	</div>

	</div>

