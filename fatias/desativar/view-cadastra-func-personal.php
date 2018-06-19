<div class="row  clearfix"  style="width:90%">

<h3 class="alert-info"> Cadastrar Funcionários/Personais </h3>

    <form action="bd/cadastra-aluno.php" method="post">

        <script src="scripts/cadastra-aluno.js"></script>



      <div style="width:47%; float:left;" align="left">   
            <h2 class="bg-black-fosco"> Dados Cadastrais </h2>         

                      <div class="form-group">
                          <label for="nomeCompleto">Nome Completo</label>
                          <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite nome completo">
                      </div>

                      <div class="form-group">
                          <label for="CPF">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" onkeyup="mascara(this, mcpf);" maxlength="14"  onblur="txtCpf($(this).val())" placeholder="Digite CPF">
                      </div>


                      <div class="form-group">
                          <label for="RG">RG</label>
                          <input type="text" class="form-control" id="rg" name="rg" onkeyup="mascara(this, m);" maxlength="14" placeholder="Digite RG">
                      </div>

                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="exemplo - jane.doe@example.com">
                      </div>

                      <div class="form-group">
                          <label for="dataNascimento">Data de Nascimento</label>
                          <input type="text" class="form-control data" id="dataNascimento" name="dataNascimento" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data de Nascimento (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="cref">CREF</label>
                          <input type="text" class="form-control data" id="cref" name="cref" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="apenas números">
                      </div>

                       <div class="form-group">
                          <label for="dataInicio">Data Inicio</label>
                          <input type="text" class="form-control" id="dataInicio" name="dataInicio" onkeyup="mascara(this, mtel);" maxlength="14" placeholder="Data - (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="carteiraTrabalho">Carteira de Trabalho</label>
                          <input type="text" class="form-control" id="carteiraTrabalho" name="carteiraTrabalho" onkeyup="mascara(this, mtel);" maxlength="14" placeholder="(apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="sexo">Sexo</label>
                          <select size="1" class='form-control' name="sexo" id="sexo">
                              <option selected value="feminino">Feminino</option>
                              <option value="masculino">Masculino</option>
                          </select>
                      </div>
                      
                
        </div>

       


        <div style="width:47%; float:right;" align="left">
        <h2 class="bg-black-fosco"> Endereço </h2>  

                      <div class="form-group">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control" id="cep" name="cep" onblur="buscaCep($(this).val())" onkeyup="mascara(this, mcep);" maxlength="9" placeholder="Digite CEP (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="endereco">Endereço</label>
                          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite endereco">
                      </div>


                      <div class="form-group">
                          <label for="numero">Número</label>
                          <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite Número">
                          </div>

                      <div class="form-group">                   
                          <label for="complemento">Complemento</label>
                          <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite informações Adicionais">
                      </div>

                      <div class="form-group">
                          <label for="bairro">Bairro</label>
                          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro">
                      </div>

                      <div class="form-group">
                          <label for="cidade">Cidade</label>
                          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a Cidade">
                      </div>

                      <div class="form-group">
                          <label for="estado">UF</label>
                          <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o Estado">
                      </div>


                      <div class="form-group">
                          <label for="telefoneFixo">Telefone Fixo</label>
                          <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" onkeyup="mascara(this, mtel);" maxlength="14" placeholder="Telefone Fixo (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="telefoneCelular">Telefone Celular</label>
                          <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" onkeyup="mascara(this, mtel);" maxlength="15" placeholder="Celular (apenas números)">
                      </div>

                      
                      <div class="form-group">
                          <label for="opcaoCadastral">Opção de Cadastro</label>
                          <select size="1" class='form-control' name="opcaoCadastral" id="opcaoCadastral">
                              <option selected value="Personal">Personal</option>
                              <option value="FUncionario">funcionario</option>
                          </select>
                      </div>


                        <!--button type="button" class="btn btn-success" id="btnEnviarInfo" onClick="enviarInfo()">Enviar informações e iniciar 2ª etapa do Cadastro ::</button-->
                       <button type="submit" class="btn btn-success">Enviar informações e iniciar etapa de biometria ::</button>
        </div>

</form>

</div>
<br />