<?php
include("connection.php");

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

if ($usuario != "" && $senha != "") {
	$res = mysql_query("SELECT * FROM clientes
            WHERE email='$usuario' AND senha='$senha'", $bd);
	if ($res != NULL) {
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