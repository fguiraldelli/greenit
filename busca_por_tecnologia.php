<?php

if ($_SESSION["busca_tec"] != '') {
    $query = "SELECT * FROM tecnologia WHERE nome LIKE '%" . $_SESSION["busca_tec"] . "%'";
    $result = mysql_query($query);
    $linhas = mysql_num_rows($result);
    echo "<br /><br />";

    echo "<b>Foram encontradas " . $linhas . " tecnologia(s) com o nome '" . $_SESSION["busca_tec"] . "'</b><br /><br />";
    while ($row = mysql_fetch_array($result)) {
        echo "Nome: " . $row['nome'] . "<br />";
    }
}
?>
