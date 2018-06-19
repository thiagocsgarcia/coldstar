<script src="scripts/compras.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> GERENCIAR ALUNOS</h3>

			<div class="col-md-6 bg-success" align="left">								

					
					<button class="btn btn-success" data-toggle='modal' data-target='#modalEntradaRetiradaCaixa'><i class="glyphicon glyphicon-plus"></i>  Adicionar Entrada / Retirada  </button>
				
					<button class="btn btn-success" href="#" data-toggle='modal' data-target='#modalVales'><i class="mdi mdi-account-plus"></i>  Adicionar Vales  </a>			 	
				
			</div>

			<div class="col-md-6 bg-success" align="right">								
					
					<a class="btn btn-warning" href="principal.php?acao=cadastra-aluno" role="button"><i class="glyphicon glyphicon-print"></i>  Testar impressora Fiscal  </a>
					
					<a class="btn btn-warning" href="principal.php?acao=cadastra-aluno" role="button"><i class="glyphicon glyphicon-list-alt"></i>  Relatório X  </a>
				
					<a class="btn btn-danger" href="principal.php?acao=cadastra-aluno" role="button"><i class="glyphicon glyphicon-floppy-remove"></i>  Fechar Fiscal  </a>			 	
				
			</div>

			<br /><br />
	</div>


	

	<div class="col-md-12">
	
		<h3 class="alert-info"> ÚLTIMAS COMPRAS</h3>

		
		<div class="col-md-12" id='divCompras'>

			

		</div>

		<p>  </p>	

	</div>		







<!-- Modal Entrada/Retirada de Dinheiro -->

		<div id="modalEntradaRetiradaCaixa" class="modal fade" role="dialog">
			<script src="#"></script>
			  	<div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content" style="width: 500px;">

					      <div class="modal-header" style="background-color: #FF9900;">
						        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
						        <h4 class="modal-title" align="center"> Adicionar / Retirar </h4>
					      </div>

					      <div class="modal-body" align="center" style="background-color: #333333">

					      		<div class='vermelho-laranja' align='center' id="#"> 31/10/2015 </div>
								
									<div class="form-group">
										<label class="bg-black-fosco" for="opcaoCaixa" align="left">Opção de Caixa</label>
						      		    <select size='1' class="form-control" id="opcaoCaixa"> 

											<option value="retirada"> Retirada </option>
											<option value="retirada"> Adição </option>

						      		    </select>
						      		</div>

						      		<div class="form-group">
						      			
						      			<label class="bg-black-fosco" for="descricao"> Descrição </label>
										<input type="text" class="form-control" id="descricaoOpcao" placeholder='Digite a descrição ...'>

						      		</div>

						      		<div class="form-group">
						      			
						      			<label class="bg-black-fosco" for="valor"> Valor </label>
										<input type="text" class="form-control" id="valor" placeholder=' R$ 0,00 '>

						      		</div>

						      		<button class="btn btn-success" id="btnIncluirBio" onclick=""> Adicionar ... </button>							
								
								
					      </div>

					      <div class="modal-footer" style="background-color: #FF9900;">
					        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
					      </div>

				    </div>

			 	</div>
		</div>
		
<!-- Fim Modal BioImpedancia -->	





<!-- Modal VALE -->

		<div id="modalVales" class="modal fade" role="dialog">
			<script src="#"></script>
			  	<div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content" style="width: 500px;">

					      <div class="modal-header" style="background-color: #FF9900;">
						        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
						        <h4 class="modal-title" align="center"> Adicionar Vale </h4>
					      </div>

					      <div class="modal-body" align="center" style="background-color: #333333">

					      		<div class='vermelho-laranja' align='center' id="#"> 31/10/2015 </div>
								
									<div class="form-group">
										<label class="bg-black-fosco" for="valeFuncionario" align="left">Funcionário</label>
						      		    <select size='1' class="form-control" id="valeFuncionario"> 

											<option value="1"> funcionário 1 </option>
											<option value="2"> funcionário 2 </option>
											<option value="3"> funcionário 3 </option>
											<option value="4"> funcionário 4 </option>

						      		    </select>
						      		</div>

						      		<div class="form-group">
										<label class="bg-black-fosco" for="tipoVale" align="left">Tipo de Vale</label>
						      		    <select size='1' class="form-control" id="tipoVale"> 

											<option value="dinheiro"> Dinheiro </option>
											<option value="transporte"> Transporte </option>

						      		    </select>
						      		</div>

						      		<div class="form-group">
						      			
						      			<label class="bg-black-fosco" for="descricao"> Descrição </label>
										<input type="text" class="form-control" id="descricaoOpcao" placeholder='Digite a descrição ...'>

						      		</div>

						      		<div class="form-group">
						      			
						      			<label class="bg-black-fosco" for="valor"> Valor </label>
										<input type="text" class="form-control" id="valor" placeholder=' R$ 0,00 '>

						      		</div>

						      		<button class="btn btn-success" id="btnIncluirBio" onclick=""> Adicionar ... </button>							
								
								
					      </div>

					      <div class="modal-footer" style="background-color: #FF9900;">
					        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
					      </div>

				    </div>

			 	</div>
		</div>

		
<!-- Fim VALE -->		
	
