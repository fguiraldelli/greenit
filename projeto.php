
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
        <a href="index.php?r=form" class="medium-button">
            Adicionar Novo Projeto </a>
        <br />
        <a href="index.php?r=pesquisa_projeto" class="medium-button">
            Pesquisar Projetos </a>
        <br />
        <a href="index.php?r=pesquisa_tecnologia" class="medium-button">
            Pesquisar Tecnologia </a>
    </div>
    
    <div class="col-direita2">
        <table class="projeto">
            <?php
            echo "<form id = \"form3\" action=\"atualiza_projeto.php\" method=\"POST\">";
            echo "<input type=hidden name=\"nome-proj\" id=\"nome-proj\" />";
            echo "<input type=hidden name=\"tipo\" id=\"tipo\" />";
            echo "<input type=hidden name=projeto id=projeto />";

            $sql = "select * from projeto where idu = " . $idu;
            $res = mysql_query($sql);

            while ($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td class=\"proj\">" . $row['titulo'] . "</td> ";
		echo "<td class=\"button\"><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 2);\"
                    class=\"small-button\"> Detalhes do projeto </a></td>";
                echo "<td class=\"button\"><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 0);\"
                    class=\"small-button\"> Ver Matriz </a></td>";
                echo "<td><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 1);\"
                    class=\"small-button\">
                    Editar Avaliação </a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br /><br />
    </div>
</div>
