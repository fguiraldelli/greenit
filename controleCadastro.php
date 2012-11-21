<?php

$nome = $_POST["nome"];
$empresa = $_POST["empresa"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);

include("connection.php");
$sql = "SELECT * FROM usuario WHERE email='" . $email . "'";
$result = mysql_query($sql);
$linhas = mysql_num_rows($result);
if (!$linhas) {
//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
    $query = "INSERT INTO `usuario` ( `nome` , `empresa` , `email` , `senha`) 
    VALUES ('" . "$nome" . "', " . "'$empresa'" . "," . "'$email'" . ", " . "'$senha'" . ")";
    mysql_query($query);

    echo "Seu cadastro foi realizado com sucesso! Agradecemos a atenção<br>";
    echo "<a href=" . "index.php?r=inicio" . ">Voltar</a>";
}
else{
    echo "<font color=red><b>Erro: Usuário já existe, tente outro e-mail!!!.</b></font><br />";
    echo "<a href=" . "index.php?r=cadastro" . ">Voltar</a>";
}
?>
