<div class="breadcrumbs">
    <a href="index.php">Início</a> >> <span>Busca</span>
</div>

<?php
    $tipo = $_GET["tipo"];
    echo "<form name=\"busca\" method=\"post\" action=\"index.php?r=resbusca&tipo=" . $tipo . "\">";
        if (strcmp($tipo, "tec") == 0) {
            echo "<label>Nome da tecnologia:</label>";
        } else {
            echo "<label>Nome do projeto:</label>";
        }
    echo "<br /><input name=\"nome\" type=\"text\" id=\"nome\" size=\"70\" maxlength=\"60\" />";
    echo "<br /><br />";
    
    echo "<p><input name=\"buscar\" type=\"submit\" id=\"buscar\" value=\"Buscar\" />";
    echo "</p></form>";
?>
