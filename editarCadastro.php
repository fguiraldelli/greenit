<?php

$empresa = $_POST["empresa"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);

include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];


$sql = "SELECT * FROM usuario WHERE email='" . $email . "'";
$result = mysql_query($sql);
$linhas = mysql_num_rows($result);

  if (!$linhas) {
      //altera os dados no banco
      $query = "UPDATE usuario
      SET empresa = '". $empresa ."',  email = '".$email."',  senha = '".$senha."'
      WHERE id = '".$idu."'";

      mysql_query($query);

      echo "Seu cadastro foi Alterado com sucesso!<br />";
      //echo "<a href=" . "index.php?r=inicio" . ">Voltar</a>";
      include("inicio.php");
  }
  else{
      echo "<font color=red><strong>Erro: Usuário já existe, tente outro e-mail</strong></font><br />";
      include("inicio.php");
  }
?>