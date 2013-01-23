
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
        <a href="index.php?r=form" class="medium-button"> Adicionar Novo Projeto </a>



    </div>
    <div class="col-meio">
        <table class="projeto">
            <?php
            $sql = "select * from projeto where idu = " . $idu;
            $res = mysql_query($sql);
            while ($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td class=\"proj\">" . $row['titulo'] . "</td> ";
                echo "<td class=\"button\"><a href=\"#\" class=\"small-button\"> Ver Matriz </a></td>";
                echo "<td><a href=\"#\" class=\"small-button\"> Editar Questionário </a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br /><br />
    </div>

    <div class="col-direita2" id="dados-proj" style="display:none">
        <p class="titulo"> Histórico de Projetos FILHA DA PUTA</p>
        <table>
            <?php/*
            $sql = "select * from projeto where idu = " . $idu;
            $res = mysql_query($sql);
            while ($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td class=\"proj\">" . $row['titulo'] . "</td> ";
                echo "<td class=\"button\"><a href=\"#\" class=\"small-button\"> Ver Matriz </a></td>";
                echo "<td><a href=\"#\" class=\"small-button\"> Editar Questionário </a></td>";
                echo "</tr>";
            }*/
            ?>
        </table>
        <br /><br />
    </div>
</div>
