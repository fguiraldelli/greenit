<div class="breadcrumbs">
    <a href="index.php">Início</a> >> <span>Editar Dados</span>
</div>
<br><br>
<form  name="edita_empresa" id="edita_empresa" method="post" action="">

    <label class="cadastro">Empresa</label><br>
    <input name="campo" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
    <input type="hidden" name="op" value="emp" id="op" >
    <br /><br />
    <input name="ed_empresa" type="submit" id="ed_empresa" value="Editar empresa" onclick="validaRenomearEmpresa()"/>
</form>
<form  name="edita_email" id="edita_email" method="post" action="">
    <label class="cadastro">Email </label><br>
    <input name="campo" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
    <br /><br />
    <input type="hidden" name="op" value="mail" id="op" >
    <input name="ed_email" type="submit" id="ed_email" value="Editar email" onclick="validaRenomearEmail()"/>
</form>
<form  name="edita_senha" id="edita_senha" method="post" action="">
    <label class="cadastro">Nova Senha </label><br>
    <input name="campo" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
    <span class="style1"> Digite uma senha de 7 a 12 caracteres</span>
    <br /><br />
    <label class="cadastro">Repita a Senha <span class="style1">*</span></label><br>
    <input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
    <input type="hidden" name="op" value="senha" id="op" >
    <br /><br/>
    <input name="ed_senha" type="submit" id="ed_senha" value="Editar senha" onclick="validaRenomearSenha()"/>
    <p>
</form>

        <span class="style1"><br>* Campos com * são obrigatórios!<br> Campos em vermelho precisam ser revisados</span>
    </p>