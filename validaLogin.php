<?php

include("connection.php");

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);

if ($usuario != "" && $senha != "") {
    $sql = "SELECT * FROM usuario WHERE email='" . $usuario . "' AND senha='" . $senha . "'";
    $res = mysql_query($sql);
    $campoUser = mysql_fetch_array($res);
    print "Bem Vindo, " . $campoUser["nome"] . "<br>";
    $linhas = mysql_num_rows($res);
    if ($linhas == 1) {
        //inicia a sessao
        session_set_cookie_params(0);
        session_start();
        echo "Login efetuado com sucesso.<br>";
        echo "<a href="."index.php?r=inicio".">Voltar</a>";
        //coloca na sessao o codigo e o nome de usuario
        $_SESSION["AUTH"] = true;
        $_SESSION["usuario"] = $campoUser["nome"];
        $_SESSION["TIME"] = time();
    } else {
        echo "<font color=red><b>Erro: Usuário e/ou senha incorretos.</b></font><br />";
        //se o usuario nao for encontrado, nao autentica
        $_SESSION["AUTH"] = false;
        include("login.php");
    }
} else {
    if ($_POST['abriuForm'] == 1) {
        if ($usuario == "") {
            echo "<font color=red><b>Erro: Digite um nome de usuário.</b></font><br />";
        }
        if ($senha == "") {
            echo "<font color=red><b>Erro: Digite uma senha.</b></font><br />";
        }
        include("login.php");
    }
}
?>