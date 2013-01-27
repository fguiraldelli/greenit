<?php

$campo = $_POST["campo"];
$op = $_POST["op"];


include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];


$sql = "SELECT * FROM usuario WHERE email='" . $email . "'";
$result = mysql_query($sql);
$linhas = mysql_num_rows($result);

  if (!$linhas) {
      //altera os dados no banco
      if($op == 'emp'){
        $query = "UPDATE usuario
        SET empresa = '". $campo ."'
        WHERE id = '".$idu."'";

        mysql_query($query);

      }else if($op == 'mail'){
        $query = "UPDATE usuario
        SET email = '". $campo ."'
        WHERE id = '".$idu."'";

        mysql_query($query);

      }else {
        $query = "UPDATE usuario
        SET senha = '". md5($campo) ."'
        WHERE id = '".$idu."'";

        mysql_query($query);
      }
      include("inicio.php");
      echo "Seu cadastro foi Alterado com sucesso!<br />";

  }
  else{
      echo "<font color=red><strong>Erro: Usuário já existe, tente outro e-mail</strong></font><br />";
      include("inicio.php");
  }
?>