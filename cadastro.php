<div class="breadcrumbs">
    <a href="index.php">Início</a> >> <span>Cadastro</span>
</div>

<form  name="cadastro" method="post" action="controleCadastro.php">
      <!--<td class="cadastro">Nome:</td>-->
    <label class="cadastro">Nome <span class="style1">*</span></label><br>
    <input name="nome" type="text" id="nome" size="70" maxlength="60" onkeyup="validaNome(this.id,this.value)"/>
    <br></p>
    <label class="cadastro">Empresa <span class="style1">*</span></label><br>
    <input name="empresa" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
    <br></p>
    <label class="cadastro">Email <span class="style1">*</span></label><br>
    <input name="email" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
    <br></p>
    <label class="cadastro">Senha <span class="style1">*</span></label><br>
    <input name="senha" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
    <span class="style1"> Digite uma senha de 7 a 12 caracteres</span><br></p>
    <label class="cadastro">Repita a Senha <span class="style1">*</span></label><br>
    <input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
    <br>
    <p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" onclick="return validaForm();" /> 


        <input name="limpar" type="reset" id="limpar" value="Limpar" />


        <span class="style1"><br>* Campos com * são obrigatórios!<br> Campos em vermelho precisam ser revisados</span></p>
</form>
