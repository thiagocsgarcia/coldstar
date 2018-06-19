<script src="scripts/nova-compra.js"></script>
<input type="hidden" id="hidCompra">


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> NOVA COMPRA</h3>		

	

			<div class="col-md-12 bg-success">	
				<div class="col-md-8">

					<div class="form-group">

						<label for="txtCodigoBarras"> Produto </label>
						<input type="text" class="form-control" id="txtCodigoBarras" onkeyup="carregaProdutosParaCompra()" placeholder="Digite código de Barras ou descrição do produto">

					</div>

					<table class="table table-condensed" style="" visible='false'>

						<thead class="bg-black-fosco">
							

						</thead>
						<tbody id='listaProdutosParaCompra'>
						
							
							
						</tbody>

					</table>
				</div>
			</div>

			<div class="col-md-12">

				<br />

			</div>

			<div class="col-md-8">

				<table class="table table-condensed" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco">
						<td> Cod Barras </td>
						<td> QTD </td>
						<td> Descrição </td>
						<td> Valor (R$) </td>
						<td> Desconto ( % / $ ) </td>
						<td> Total (R$)</td>
						<td colspan="2" align="center"> Ações </td>

					</thead>
					<tbody id='listaDeCompras'>
					
						
						
					</tbody>

				</table>

			</div>

			<div class="col-md-4" align="right">
				
				<button id='btnExcluiDescontoCompra' class="btn btn-sm btn-danger btn-block" onclick="excluirDescontoCompras()"> Excluir Desconto </button>
				<h4 class="bg-black-fosco" align="center"> Desconto Compra R$ <b id='descontoCompra'>0.00 </b> </h4>
				<h4 class="bg-black-fosco" align="center"> Desconto Produtos R$ <b id='TotalDescontoProdutos'>0.00 </b> </h4>

				
				<h1 class="bg-black-fosco" align="center"> Total R$ <b id='total'>0.00 </b> </h1>

				<img src="images/logo-completo.png" class="img-responsive img-rounded" />

				<br />
				
				<button id='btnEncerrarPedidos' class="btn btn-success btn-block" onclick="encerrarPedidos()" role="button"> Encerrar Pedidos </button>

				<hr />

				<button id='btnFecharCompra' class="btn btn-sm btn-success" href="" data-toggle='modal' data-target='#modalFechamentoCompra' onclick="fecharCompra(); somaTodosProdutos(); $('#txtCodigoOperacao').focus();" role="button"> Fechar Compra </button>

				<button id='btnDescontoAluno' class="btn btn-sm btn-info"> Adicionar Aluno </button>
				<button id='btnDescontoCompra' class="btn btn-sm btn-info" data-toggle='modal' data-target='#modalDescontoCompra'> Desconto </button>

			</div>


	<div class="col-md-12">

		<br />

	</div>

	</div>









<!-- Modal fechar Compra -->

	<div id="modalFechamentoCompra" class="modal fade" role="dialog">
			
	  	<div class="modal-dialog modal-lg">

			    <!-- Modal content-->
		    <div class="modal-content">

		     	<div class="modal-header col-md-12" style="background-color: #FF9900;">
			        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
			        <h4 class="modal-title" align="center"> Fechar Compra </h4>
		     	</div>



			    <div class="modal-body col-md-12" align="" style="background-color: #333333">
					


					<div class="col-md-12">

							<div class=" col-md-6">
							

								<h1>	
								 <b class="bg-black-fosco" align="center" id=""> SubTotal R$ </b>	
								 <b class="bg-black-fosco" align="center" id="subTotalCompra"> TOTAL </b>	
								</h1>
					      			
									 <table class="table table-bordered bg-black-fosco">
								 	<tr>
								 		<td class="bg-black-fosco">Desconto em Produtos</td>
								 		<td class="bg-black-fosco">R$ <b id='descProd'></b> </td>
								 	</tr>

								 	<tr>
								 		<td class="bg-black-fosco">Desconto em Compras</td>
								 		<td class="bg-black-fosco">R$ <b id='descComp'></b> </td>
								 	</tr>

								 	<tr>
								 		<td class="bg-black-fosco">Desconto de Aluno</td>
								 		<td class="bg-black-fosco">R$ <b id='descAluno'></b> </td>
								 	</tr>

								 	<tr>
								 		<td class="bg-black-fosco">Nome do Aluno</td>
								 		<td class="bg-black-fosco"><b id='nomeAluno'></b> </td>
								 	</tr>

								 	<tr>
								 		<td class="bg-black-fosco">Quantidade de ítens</td>
								 		<td class="bg-black-fosco"><b id='quantItem'></b> </td>
								 	</tr>

								 	<tr>
								 		<td class="bg-black-fosco">Volume de Itens</td>
								 		<td class="bg-black-fosco"><b id='VolumeItem'></b> </td>
								 	</tr>
								 	<tbody id=''>
								 									 		
								 	</tbody>

								 </table>
								 
								 <h1 class="bg-black-fosco" id='numerosFinais'>	
								 <b class="bg-black-fosco" align="center" id="totalLabel"> Total R$ </b>	
								 <b class="bg-black-fosco" align="center" id="totalCompra"> TOTAL </b>	
								 </h1>

						      	
								
						    </div>
					    	


			      			<div class=" col-md-6">



								<h5 class="bg-black-fosco"> Tabela de Condições de Pagamento </h5>
								
								<table class="table table-condensed bg-black-fosco" id='tabelaCodigos' style="font-size:10px;">
					      			<tr>
					      				<td>Dinheiro (à vista)</td>
					      				<td>1</td>					      				
					      			</tr>
									
									<tr>
					      				<td>Master Débito</td>
					      				<td>2</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Visa Débito</td>
					      				<td>3</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Elo Débito</td>
					      				<td>4</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Master Crédito</td>
					      				<td>5</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Visa Crédito</td>
					      				<td>6</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Ticket Refeição</td>
					      				<td>7</td>					      				
					      			</tr>	

					      			<tr>
					      				<td>Alelo Refeição</td>
					      				<td>8</td>					      				
					      			</tr>

					      			<tr>
					      				<td>Sodex</td>
					      				<td>9</td>					      				
					      			</tr>				      			


					      		</table>



					      		<label for="slcFormaPagto" class="bg-black-fosco"> Condições dePagamento </label>

					      		<div class="form-inline">
									
									<input type="text" class="form-control input-sm" id='txtCodigoOperacao' style="width:50px" maxlength="1" onkeyup="mascara(this, mnum); defineFormaPagto()" />							
						      		<select class="form-control input-sm" id='slcFormaPagto' disabled="disabled">

						      		<option value="av"> Dinheiro(à vista) </option>
						      		<option value="md"> Master Débito </option>
						      		<option value="vd"> Visa Débito </option>
						      		<option value="ed"> Elo Débito </option>
						      		<option value="mc"> Master Crédito </option>
						      		<option value="vc"> Visa Crédito </option>
						      		<option value="tr"> Ticket Restaurante </option>
						      		<option value="ar"> Alelo Refeição </option>
						      		<option value="sd"> Sodex </option>
						      		

						      		</select>

						      		<select class="form-control input-sm" id='slcParcelas' style='display:none;'>

						      		<option value="1"> 1x </option>
						      		<option value="2"> 2x </option>
						      		<option value="3"> 3x </option>
						      		<option value="4"> 4x </option>
						      		<option value="5"> 5x </option>
						      		<option value="6"> 6x </option>
						      		<option value="7"> 7x </option>
						      		<option value="8"> 8x </option>
						      		<option value="9"> 9x </option>
						      		

						      		</select>		
						      	</div>


					      		<label for="slcFormaPagto" class="bg-black-fosco"> Valor à pagar (R$)</label>
					      		<div class="form-inline">					      			
					      			<input type="text" class="form-control input-sm" id='txtValorApagar' onkeyup="mascara(this, mvalorAmerican);" placeholder='digite valor à pagar'/>
					      			<button class="btn btn-sm btn-info" onclick="atualizaFormaPagamento()"> Adicionar </button>
					      		</div>

					      		<hr />




					      		<div id='pagamentosRegistrados' class="col-md-12">

					      		<h4 class="bg-black-fosco"> Pagamentos realizados </h4>

						      		<table class="table table-condensed bg-black-fosco" id='tabelaPagamentosRegistrados'>
						      			

						      		</table>										      		

								</div>
						      	
							</div>

						<button class="btn btn-sm btn-success btn-block" onclick="finalizarCompra()"> Finalizar </button>	

			    	</div>


		        

		    	</div>

		    <div class="modal-footer col-md-12" style="background-color: #FF9900;">
		        	<button type="button" class="btn btn-default" data-dismiss="modal"> Fechar </button>
		    </div>

		  	</div>

		</div>

	</div>

<!-- Fim Modal fechar Compra -->





<!-- Modal Desconto Compra -->

			<div id="modalDescontoCompra" class="modal fade" role="dialog">
			
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">

			     	<div class="modal-header col-md-12" style="background-color: #FF9900;">
				        <button type="button" class="close" data-dismiss="modal" id="btnFecharModal">&times;</button>
				        <h4 class="modal-title" align="center"> Fechar Compra </h4>
			     	</div>



				    <div class="modal-body col-md-12" align="" style="background-color: #333333">
						
						<hr />

						<div class="form-inline">

							<input type="text" class="form-control" id='txtDescontoValor' onkeyup="mascara(this, mnum);" placeholder='Desconto por Valor'/>
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="calcularDescontoCompra('nao');"> Adicionar </button>

						</div>

						<hr />

						<div class="form-inline">

							<input type="text" class="form-control"id='txtDescontoPorcentagem' onkeyup="mascara(this, mnum);" placeholder='Desconto por Porcentagem'/>
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="calcularDescontoCompra('sim');"> Adicionar </button>
							
						</div>

						<hr />

							
				    </div>


				      <div class="modal-footer col-md-12" style="background-color: #FF9900;">
				        	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#txtCodigoBarras').focus();"> Fechar </button>
				      </div>

			    </div>

			  </div>
			</div>
		</div>
<!-- Fim Modal Desconto Compra -->

