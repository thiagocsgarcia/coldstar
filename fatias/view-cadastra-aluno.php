

<div class="col-md-12">

     <ul class="breadcrumb">
            <li><a href="principal.php?acao=principal">Home</a></li> 
            <li><a href="principal.php?acao=gerencia-alunos">Gerenciar Alunos</a></li>            
            <li class="active">Cadastro de Alunos - Etapa 1</li>
     </ul>
</div>


<div class="col-md-12 bg-cinza-claro">     
    <script src="scripts/cadastra-aluno.js"></script>

    <h3 class="alert-info" align="center"> ETAPA 1 - INFORMAÇÕES CADASTRAIS </h3>

 
      <div class="col-md-6" align="left" class="bg-cinza-claro">   
            <h4 class="bg-cinza-prata"> DADOS CADASTRAIS </h4>     

                  <input type="hidden" id="hidIdAluno" value=<?php echo (isset($_GET['id']))?$_GET['id']:null;?> />    

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
                          <input type="text" class="form-control" id="rg" name="rg" onkeyup="mascara(this, mrg);" maxlength="14" placeholder="Digite RG">
                      </div>

                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" onblur="verificaEmail($(this).val())" placeholder="exemplo - jane.doe@example.com">
                      </div>

                      <div class="form-group">
                          <label for="dataNascimento">Data de Nascimento</label>
                          <input type="text" class="form-control data" id="dataNascimento" onkeyup="mascara(this, mdata);" maxlength="10" onblur="verificaIdade($(this).val())"  placeholder="Data de Nascimento (apenas números)">
                      </div>

                      <fieldset id="divMenorIdade" style="display:none; background-color: rgba(182, 184, 127, 0.3);">
                        <legend> Menor de Idade</legend>
                          <div class="form-group">
                            <label for="nomeFiliacao">Nome da Filiação</label>
                            <input type="text" class="form-control" id="nomeFiliacao" name="nomeFiliacao" placeholder="Digite nome completo">
                          </div>

                          <div class="form-group">
                              <label for="cpfFiliacao">CPF - Filiação</label>
                              <input type="text" class="form-control" id="cpfFiliacao" name="cpfFiliacao" onkeyup="mascara(this, mcpf);" maxlength="14"  onblur="txtCpf($(this).val())" placeholder="Digite CPF">
                          </div>

                      </fieldset>

                      <div class="form-group">
                          <label for="dataExame">Data de Exame</label>
                          <input type="text" class="form-control data" id="dataExame" onkeyup="mascara(this, mdata);" maxlength="10"  placeholder="Data do Exame Médico (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="sexo">Sexo</label>
                          <select size="1" class='form-control' name="sexo" id="sexo">
                              <option value="m">Masculino</option>
                              <option value="f">Feminino</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="telefoneFixo">Telefone Fixo</label>
                          <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" onkeyup="mascara(this, mtel);" maxlength="14" placeholder="Telefone Fixo (apenas números)">
                      </div>

                      <div class="form-group">
                          <label for="telefoneCelular">Telefone Celular</label>
                          <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" onkeyup="mascara(this, mtel);" maxlength="15" placeholder="Celular (apenas números)">
                      </div>

                     <!-- <div class="form-group">
                          <label for="nomeCompleto">Nome Completo - Responsável</label>
                          <input type="text" class="form-control" id="nomeCompletoResponsavel" name="nomeCompletoResponsavel" placeholder="Digite nome completo">
                      </div>

                      <div class="form-group">
                          <label for="CPF">CPF - Responsável</label>
                          <input type="text" class="form-control" id="cpfResponsavel" name="cpfResponsavel" onkeyup="mascara(this, mcpf);" maxlength="14"  onblur="txtCpf($(this).val())" placeholder="Digite CPF">
                      </div> -->

                      
                
        </div>

       


        <div class="col-md-6" align="left">
              <h4 class="bg-cinza-prata"> ENDEREÇO </h4>  

                      <div class="form-group">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control" id="cep" name="cep" onblur="buscaCep($(this).val())" onkeyup="mascara(this, mcep);" maxlength="9" placeholder="Digite CEP (apenas números)">
                      <a href="http://www.buscacep.correios.com.br/servicos/dnec/index.do" target="_blank"> <img src="images/correios.gif" /> </a>
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
                          <label for="grupoEspecial">Grupo Especial</label>
                          <select size="1" class='form-control' name="grupoEspecial" id="grupoEspecial" onchange="liberaOpcaoGrupo()">
                              <option selected value="N">Não</option>
                              <option value="S">Sim</option>                              
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="opcoesGrupo">Opções de grupo *obrigatório em caso de grupo especial </label>
                            <select size="1" class='form-control' name="opcoesGrupo" id="opcoesGrupo" disabled="true">
                              
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="opcaoCadastral">Opção de Cadastro</label>
                          <select size="1" class='form-control' name="opcaoCadastral" id="opcaoCadastral">
                              <option selected value="aluno">Aluno</option>
                              <option value="vip">VIP</option>
                              <option value="convidado">Convidado</option>
                          </select>
                      </div>

                        <div style="margin-bottom:1em" align="right">
                        <!--button type="button" class="btn btn-success" id="btnEnviarInfo" onClick="enviarInfo()">Enviar informações e iniciar 2ª etapa do Cadastro ::</button-->
                           <button id="btnCadastrar" class="btn btn-success" onclick="enviarInfo()">Enviar informações e iniciar 2ª etapa do Cadastro ::</button>
                           <button id="btnSalvar" style="display:none" class="btn btn-success" onclick="atualizarFuncionario()">Salvar Informações ::</button>
                        </div>
        </div>
        


</div>
<br />