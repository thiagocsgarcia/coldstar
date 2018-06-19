<script src="scripts/entrada-produtos.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> GERENCIAR PRODUTOS </h3>		

		<div class="col-md-12">

			<div class="col-md-6 bg-success">	



				<div class="col-md-12 bg-success">
					<div class="col-md-8 form-group">

						<label for="txtPesquisaFornecedor"> Pesquisar Produto</label>
						<input type="text" class="form-control" id="textBuscaProduto" onkeyup="pesquisarProduto()">

					</div>

					
				</div>

				<h2 class="vermelho-laranja" align="center"> Pedidos Cadastrados: <b id='totalProdutos'> </b> </h2>

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> Cód. Barras </td>
						<td> Nome Fantasia </td>
						<td colspan="2">  Ações </td>

					</thead>
					<tbody align="center" id='tabelaProdutos'>
						

					</tbody>

				</table>

				<h3 class="bg-black-fosco"> Novo Produto</h3>

					

						<div class="form-group">
								<label for="txtId"> ID </label>
								<input type="text" class="form-control" id="txtId" placeholder="Identificador" disabled="disabled">

							</div>

						<div class="form-group">

							<label for="txtCodBarras"> Código de barras </label>
							<input type="text" class="form-control" id="txtCodBarras" placeholder="Código de Barras">
						</div>
						
						<div class="form-group">

							<label for="txtDescricao"> Descrição </label>
							<input type="text" class="form-control" id="txtDescricao" placeholder="Digite a descrição">
						</div>

						<div class="form-group">
							<label for="slcCategoria"> Categoria </label>
							<select type="select" class="form-control" id="slcCategoria" placeholder="Escolha a Categoria">
								

							</select>

						</div>

						<div class="form-group">
							<label for="slcFornecedor"> Fornecedor </label>
							<select type="select" class="form-control" id="slcFornecedor" placeholder="Escolha o Fornecedor" onchange="carregarImpostosFornecedores()">
								

							</select>

						</div>

						

							<div class="form-group col-md-3">
								<label for="txtSt"> ST </label>
								<input type="text" class="form-control col-md-2" id="txtSt" placeholder="" readonly>						

							</div>

							<div class="form-group col-md-3">
								<label for="txtIcms"> ICMS </label>
								<input type="text" class="form-control" id="txtIcms" placeholder="" onkeyup="mascara(this, mvalor)" readonly>

							</div>

							<div class="form-group col-md-3">
								<label for="txtIpi"> IPI </label>
								<input type="text" class="form-control" id="txtIpi" placeholder="" onkeyup="mascara(this, mvalor)" readonly>

							</div>

							<div class="form-group col-md-3">
								<label for="txtCustoi"> Custo I. </label>
								<input type="text" class="form-control" id="txtCustoi" placeholder="" onkeyup="mascara(this, mvalor);" onblur="calculaCustoFinal()">

							</div>

						

						<div class="form-group">
							<label for="txtEstoque"> Estoque </label>
							<input type="text" class="form-control" id="txtEstoque" placeholder="Digite Estoque">

						</div>

						<div class="form-group col-md-4">
							<label for="txtCustof"> Custo Final </label>
							<input type="text" class="form-control" id="txtCustof" placeholder="Custo Final" readonly>

						</div>

						<div class="form-group col-md-4">
							<label for="txtPorcentagem"> Porcentagem </label>
							<input type="text" class="form-control" id="txtPorcentagem" onkeyup="mascara(this, mnum)" placeholder="Digite a Descrição" onblur="calculaPreco()">

						</div>

						<div class="form-group col-md-4">
							<label for="txtPreco"> Preço </label>
							<input type="text" class="form-control" id="txtPreco" onkeyup="mascara(this, mvalor)" placeholder="Digite Preço" readonly>

						</div>

						<div class="form-group">
							<label for="txtCtrib"> C. TRIB. </label>
							<input type="text" class="form-control" id="txtCtrib" placeholder="Digite C. TRIB.">

						</div>

						<div class="form-group">
							<label for="txtNcm"> NCM </label>
							<input type="text" class="form-control" id="txtNcm" placeholder="Digite NCM">

						</div>


					<button class="btn btn-sm btn-success btn-block" onclick="inserirProduto()"> Salvar </button>  
					<button class="btn btn-sm btn-danger btn-block" onclick="limparCaixas()"> Limpar </button>


				
			</div>


			<div class="col-md-6">
				<h3 class="bg-black-fosco" align="right"> * Descrição </h3>
				<h1 class="vermelho-laranja" align="right"> Valor Total do pedido - R$ 0,00 </h1>
				

			</div>
		
		</div>

	</div>
			
	<div class="col-md-12">

		<br />

	</div>

	</div>

