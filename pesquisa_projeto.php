
<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
?>

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
        <a href="index.php?r=busca" class="medium-button">
            Pesquisar Tecnologia </a>





    </div>
    <div class="col-direita2">
        <?php
            echo "<form id = \"formbusca\" action=\"atualiza_busca_projeto.php\" method=\"POST\">";
            echo "<label class=\"cadastro\">Digite o nome do projeto que deseja buscar</label><br>
            ";
            echo "<input name=\"busca_proj\" type=\"text\" id=\"nome\" size=\"70\" maxlength=\"60\"/>
            ";
            echo "<input name=\"buscar\" type=\"submit\" id=\"buscar\" value=\"Buscar\" /><br><br></p>";
            echo "</form>";

            $sql = "select * from projeto where idu = " . $idu;
            echo "<form id = \"form3\" action=\"atualiza_projeto.php\" method=\"POST\">";
            echo "<input type=hidden name=\"nome-proj\" id=\"nome-proj\" />";
            echo "<input type=hidden name=\"tipo\" id=\"tipo\" />";


        /* Altera os espaços adicionando no lugar o simbolo % */
        //echo $_SESSION["busca_proj"];
        if($_SESSION["busca_proj"] != ''){
            $qr = "SELECT * FROM projeto WHERE titulo LIKE '%".$_SESSION["busca_proj"]."%' ORDER BY titulo";

            // Executa a query no Banco de Dados
            $sql = mysql_query($qr);

            // Conta o total ded resultados encontrados
            $total = mysql_num_rows($sql);

            echo "Sua busca por: ";
            echo $_SESSION["busca_proj"];
            echo " retornou '$total' resultados.";
        }
        ?>

        <table class="projeto">
        <?php
            while ($row = mysql_fetch_array($sql)) {
                echo "<tr>";
                echo "<td class=\"proj\">" . $row['titulo'] . "</td> ";

                echo "<td class=\"button\"><a href\"#\" onclick=\"loadMatrix('" . $row['titulo'] . "', 0);\"
                    class=\"small-button\"> Ver Matriz </a></td>";
                echo "<td><a href\"#\" onclick=\"loadMatrix('" . $row['titulo'] . "', 1);\"
                    class=\"small-button\">
                    Editar Avaliação </a></td>";
                echo "</tr>";
            }

        ?>
        </table>
        <br /><br />
    </div>
</div>
