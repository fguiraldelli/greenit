<?php
include("connection.php");

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);

if ($usuario != "" && $senha != "") {
        $sql = "SELECT * FROM usuario WHERE email='$usuario' AND senha='$senha'";
	$res = mysql_query($sql);
        $linhas = mysql_num_rows($res);
	if ($linhas == 1) {
            echo "Login efetuado com sucesso.";
	}
	else {
		echo "<font color=red><b>Erro: Usuário e/ou senha incorretos.</b></font><br />";
		include("login.php");
	}
}
else {
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