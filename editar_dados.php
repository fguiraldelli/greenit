<div class="breadcrumbs">
    <a href="index.php">Início</a> >> <span>Editar Dados</span>
</div>
<br><br>
<form  name="cadastro" method="post" action="index.php?r=editcad">

    <label class="cadastro">Empresa <span class="style1">*</span></label><br>
    <input name="empresa" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
    <br /><br />
    <label class="cadastro">Email <span class="style1">*</span></label><br>
    <input name="email" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
    <br /><br />
    <label class="cadastro">Nova Senha <span class="style1">*</span></label><br>
    <input name="senha" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
    <span class="style1"> Digite uma senha de 7 a 12 caracteres</span>
    <br /><br />
    <label class="cadastro">Repita a Senha <span class="style1">*</span></label><br>
    <input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
    <br /><br />
    <p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" onclick="return validaForm();" />
        <input name="limpar" type="reset" id="limpar" value="Limpar" />
        <span class="style1"><br>* Campos com * são obrigatórios!<br> Campos em vermelho precisam ser revisados</span>
    </p>