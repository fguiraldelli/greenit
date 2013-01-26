<div class="conteudo">
    <div class="breadcrumbs">
        <a href="index.php">Início</a> >> <span>Projeto</span>
    </div>

    <div class="col-esquerda2">

        <p class="titulo"> Opções </p>
        <br />
        <a href="index.php?r=projeto" class="medium-button">
            Voltar</a>
        <br />
        <a href="index.php?r=pesquisa_projeto" class="medium-button">
            Pesquisar Projetos </a>
        <br />
        <a href="index.php?r=pesquisa_tecnologia" class="medium-button">
            Pesquisar Tecnologia </a>


    </div>
    <div class="col-direita2">
        <?php
            echo "<form name=\"busca\" method=\"post\" action=\"atualiza_busca_tecnologia.php\">";
            echo "<label>Nome da tecnologia:</label>";
            echo "<br /><input name=\"nome\" type=\"text\" id=\"nome\" size=\"70\" maxlength=\"60\" />";
            echo "<br /><br />";

            echo "<p><input name=\"buscar\" type=\"submit\" id=\"buscar\" value=\"Buscar\" />";
            echo "</p></form>";
            
            if($_SESSION["busca_tec"] != '') {
				$query = "SELECT * FROM tecnologia WHERE nome LIKE '%".$_SESSION["busca_tec"]."%'";
                $result = mysql_query($query);
                $linhas = mysql_num_rows($result);
                echo "<br /><br />";
                
                echo "<b>Foram encontradas " . $linhas . " tecnologia(s) com o nome '" . $_SESSION["busca_tec"] . "'</b><br /><br />";
                while ($row = mysql_fetch_array($result)) {
                    echo "Nome: " . $row['nome'] . "<br />";
                }
                
            }

        ?>

        <br /><br />
    </div>
</div>
