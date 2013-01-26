<?php
include("busca.php");

$nome = $_POST["nome"];
$tipo = strcmp($_GET["tipo"], "tec");

include("connection.php");
if ($tipo == 0) {
    $sql = "SELECT * FROM tecnologia WHERE nome LIKE '" . $nome . "' AND confidencial=0";
} else {
    $sql = "SELECT * FROM projeto WHERE titulo LIKE '" . $nome . "' AND confidencial=0";
}
$result = mysql_query($sql);
$linhas = mysql_num_rows($result);
echo "<br /><br />";
if (!$linhas) {
    echo "<b>Nenhum resultado encontrado!</b>";
} else {
    if ($tipo == 0) {
        echo "<b>Foram encontradas " . $linhas . " tecnologia(s) com o nome '" . $nome . "'</b><br /><br />";
        while ($row = mysql_fetch_array($result)) {
            echo "Nome: " . $row['nome'] . "<br />";
            echo "Descrição: " . $row['descricao'] . "<br /><br /><br />";
        }
    } else {
        echo "<b>Foram encontrados " . $linhas . " projeto(s) com o nome '" . $nome . "'</b><br /><br />";
        while ($row = mysql_fetch_array($result)) {
            echo "Nome: " . $row['titulo'] . "<br />";
            echo "Descrição: " . $row['descr'] . "<br />";
            echo "Criado em: " . $row['data'] . "<br /><br /><br />";
        }
    }
}
?>