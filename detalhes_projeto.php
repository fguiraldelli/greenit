<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
$idp = $_GET["idp"];
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
        <a href="index.php?r=pesquisa_tecnologia" class="medium-button">
            Pesquisar Tecnologia </a>
        
        </div>
    <div class="col-direita2">
        <p><b>Detalhes do Projeto</b></p><br /><br />
        <?php
        $qpr = "SELECT * FROM projeto WHERE idp=" . $idp;
        $res = mysql_query($qpr);
        $proj = mysql_fetch_array($res);
        
        /*$qu = "SELECT nome FROM usuario WHERE idu=" . $proj['idu'];
        $resu = mysql_query($qu);
        $usuario = mysql_fetch_array($resu);*/
        
        echo "Nome: " . $proj['titulo'] . "<br />";
        //echo "Autor: " . $usuario['nome'] . "<br />";
        echo "Criado em: " . $proj['data'] . "<br />";
        echo "Descrição: " . $proj['descr'] . "<br /><br />";
        echo "<a href=\"#\" onclick=\"loadMatrix('" . $proj['idp'] . "','" . $proj['titulo'] . "', 0);\"
                    class=\"small-button\"> Ver Matriz </a>";
        echo " <a href=\"#\" onclick=\"loadMatrix('" . $proj['idp'] . "','" . $proj['titulo'] . "', 1);\"
                    class=\"small-button\"> Editar Avaliação </a>";
        ?>
    </div>
</div>

