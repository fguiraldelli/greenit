<form  name="cadastro" method="post" action="controleCadastro.php">
  <table class="cadastro">
    <tr>
      <td class="cadastro">Nome:</td>
      <td width="546"><input name="nome" type="text" id="nome" size="70" maxlength="60" onkeyup="validaNome(this.id,this.value)"/>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td class="cadastro">Empresa:</td>
      <td><input name="empresa" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
      <span class="style1">*</span></td>
    </tr>

    <tr>
      <td class="cadastro">Email:</td>
      <td><input name="email" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
      <span class="style1">*</span></td>
    </tr>
    
    
      <td class="cadastro">Senha:</td>
      <td><input name="senha" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
          <span class="style1">* Digite uma senha de 7 a 12 caracteres</span></td>
    </tr>
    <tr>
      <td class="cadastro">Repita a senha:</td>
      <td><input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
          <span class="style1">*</span></td>
    </tr>
    <tr>
    <tr>
      <td colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" /> 
        

          <input name="limpar" type="reset" id="limpar" value="Limpar" />
          

          <span class="style1"><br>* Campos com * são obrigatórios!<br> Campos em vermelho precisam ser revisados</span></p>
      <p>  </p></td>
    </tr>
  </table>
</form>
