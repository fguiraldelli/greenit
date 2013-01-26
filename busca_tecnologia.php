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
            echo "<form name=\"busca\" method=\"post\" action=\"index.php?r=resbusca\">";
            echo "<label>Nome da tecnologia:</label>";
            echo "<br /><input name=\"nome\" type=\"text\" id=\"nome\" size=\"70\" maxlength=\"60\" />";
            echo "<br /><br />";

            echo "<p><input name=\"buscar\" type=\"submit\" id=\"buscar\" value=\"Buscar\" />";
            echo "</p></form>";
        ?>

        <br /><br />
    </div>
</div>
