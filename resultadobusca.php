<?php
include("busca.php");

$nome = $_POST["nome"];

include("connection.php");
$sql = "SELECT * FROM tecnologia WHERE nome LIKE '" . $nome . "' AND confidencial=0";
$result = mysql_query($sql);
$linhas = mysql_num_rows($result);
echo "<br /><br />";
if (!$linhas) {
    echo "<b>Nenhum resultado encontrado!</b>";
} else {
    echo "<b>Foram encontradas " . $linhas . " tecnologia(s) com o nome '" . $nome . "'</b><br /><br />"; 
    while ($row = mysql_fetch_array($result)) {
        echo "Nome: " . $row['nome'] . "<br />";
        //echo "Descrição: " . $row['desc'] . "<br /><br /><br />";
    }
}
?>