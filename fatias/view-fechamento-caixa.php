<script src="scripts/fechamento-caixa.js"></script>


	<div class="col-md-12">

        <ul class="breadcrumb">
                <li><a href="principal.php?acao=principal">Home</a></li>                            
                <li class="active">Gerencia Alunos</li>
         </ul>
    </div>


	<div class="col-md-12">

		<h3 class="alert-info"> FECHAMENTO </h3>		
			
			<div class="form-group bg-danger" style="font-size: -webkit-xxx-large; margin-botom:2em;" align="center" id="lblDia">

				Caixa: 

			</div>				

			<div class="col-md-6 ">	
			<h3 class="bg-black-fosco"> Informações</h3>			

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> Descrição </td>
						<td> Inserido </td>
						<td> Computado </td>

					</thead>
					<tbody align="center" id="bodyFechamento">
						<tr>
							<td> À vista </td>
							<td> <input type="text" id="txtAvista" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_av"> 0.00 </td>
 
						</tr>
						<tr>
							<td> Master Débito </td>
							<td> <input type="text" id="txtMasterDebito" class="form-control" placeholder='R$ 0.00'/> </td>							
							<td id="td_md"> 0.00 </td>
						</tr>

						<tr>
							<td> Elo Débito </td>
							<td> <input type="text" id="txtEloDebito" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_ed"> 0.00 </td>
						</tr>

						<tr>
							<td> Visa Débito </td>
							<td> <input type="text" id="txtVisaDebito" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_vd"> 0.00 </td>
						</tr>

						<tr>
							<td> Master Crédito </td>
							<td> <input type="text" id="txtMasterCredito" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_mc"> 0.00 </td>
						</tr>

						<tr>
							<td> Visa Crédito </td>
							<td> <input type="text" id="txtVisaCredito" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_vc"> 0.00 </td>
						</tr>

						<tr>
							<td> Alelo Refeição </td>
							<td> <input type="text" id="txtAleloRefeicao" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_tr"> 0.00 </td>
						</tr>

						<tr>
							<td> SODEXO </td>
							<td> <input type="text" id="txtSodexo" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_sd"> 0.00 </td>
						</tr>

						<tr>
							<td> Sangria </td>
							<td> <input type="text" id="txtSangria" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="td_sangria"> 0.00 </td>
						</tr>

						<tr>
							<td> Entrada </td>
							<td> <input type="text" id="txtEntrada" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="tdEntrada"> 0.00 </td>
						</tr>

						<tr>
							<td> Vale </td>
							<td> <input type="text" id="txtVale" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="tdVale"> 0.00 </td>
						</tr>

						<tr>
							<td> Desconto </td>
							<td> <input type="text" id="txtDesconto" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="tdDesconto"> 0.00 </td>
						</tr>

						<tr>
							<td> Desconto Produtos </td>
							<td> <input type="text" id="txtDescontoProdutos" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="tdDescontoProdutos"> 0.00 </td>
						</tr>

						<tr>
							<td> Desconto Aluno </td>
							<td> <input type="text" id="txtDescontoAluno" class="form-control" placeholder='R$ 0.00'/> </td>
							<td id="tdDescontoAluno"> 0.00 </td>
						</tr>

					</tbody>

				</table>

				<button class="btn btn-success btn-block btn-lg" id="btnProcessar"> Processar </button>

				<h2 class="vermelho-laranja" align="right" id="hDiferenca"> Diferença: R$ 0.00 </h2>
				<h2 class="verde" align="right" id="hTotal"> Total: R$ 0.00 </h2>

				<h4 class="vermelho-laranja" align="right" id="hCartoes"> - Cartões: R$ 0.00 </h4>
				<h4 class="vermelho-laranja" align="right" id="hCartoes"> - Sangrias: R$ 0.00 </h4>
				<h4 class="vermelho-laranja" align="right" id="hCartoes"> - Vales: R$ 0.00</h4>

				<h4 class="verde" align="right" id="hEntradas"> + Entradas: R$ 0.00 </h4>

				<h2 class="gold" align="right" id="hDinheiro"> Dinheiro em Caixa: R$ 0.00 </h2>

			</div>


			<div class="col-md-6 ">	
			<h3 class="bg-black-fosco"> Sangria</h3>			

				<table class="table table-bordered" style="border: 1px solid #888;border-radius:3px;">

					<thead class="bg-black-fosco" align="center">
						<td> Descrição </td>
						<td> Valor </td>
						<td> Hora </td>

					</thead>
					<tbody align="center" id="bodySangria">
						<tr>
							<td class="bg-danger" colspan="3" style="font-size: xx-large; margin-botom:2em;" align="center">
									Não há Sangria
							</td>
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

