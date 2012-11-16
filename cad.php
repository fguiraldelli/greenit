<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CADASTRO DE CLIENTES</title>
<style type="text/css">
<!--
.style1 {
color: #FF0000;
font-size: x-small;
}
.style3 {color: #0000FF; font-size: x-small; }
</style>
<script type="text/javascript">

function verifica(id,string,regex){
    if(string != null && string != ""){
        if(regex.test(string)){
            document.getElementById(id).style.color = "green";
        }else{
            document.getElementById(id).style.color = "red";
        }
    }   

}

function validaNome(id,nome){
    
    var regex = /^[a-zA-Z- ]+$/;
    verifica(id,nome,regex);
}


function validaEmpresa(id,nome){
    
    var regex = /^[a-zA-Z-0-9- ]+$/;
    verifica(id,nome,regex);
}

function validaEmail(id,email){
    var regex  = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    verifica(id,email,regex);
}

function validaSenha(id,senha){
    var regex = /^.{7,10}$/;
    verifica(id,senha,regex);
}

function matchSenha(id,match){
    
    var senha = document.getElementById("senha").value;

    if (senha == match){
        document.getElementById(id).style.color = "green";
    }else{
        document.getElementById(id).style.color = "red";
    }
    
}



</script>
</head>
<body>
<form  name="cadastro" method="post" action="cadastro.php">
  <table width="625" border="0">
    <tr>
      <td width="69">Nome:</td>
      <td width="546"><input name="nome" type="text" id="nome" size="70" maxlength="60" onkeyup="validaNome(this.id,this.value)"/>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Empresa:</td>
      <td><input name="empresa" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
      <span class="style1">*</span></td>
    </tr>

    <tr>
      <td>Email:</td>
      <td><input name="email" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
      <span class="style1">*</span></td>
    </tr>
    
    
      <td>Senha:</td>
      <td><input name="senha" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
          <span class="style1">* Digite uma senha de 7 a 12 caracteres</span></td>
    </tr>
    <tr>
      <td>Repita a senha:</td>
      <td><input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
          <span class="style1">*</span></td>
    </tr>
    <tr>
    <tr>
      <td colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" /> 
        

          <input name="limpar" type="reset" id="limpar" value="Limpar" />
          

          <span class="style1">* Campos com * são obrigatórios!<BR> Campos em vermelho precisam ser revisados</span></p>
      <p>  </p></td>
    </tr>
  </table>
</form>
</body>
</html>