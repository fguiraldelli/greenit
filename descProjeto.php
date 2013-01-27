
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
        <?php
        /* Abre o formulario */
        echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
        echo "<input type=hidden name=\"vaiprafrente\" id=\"vaiprafrente\" />";
        echo "<input type=hidden name=\"q\" value=" . $q . " />";

        echo "<div class = \"question-form\"><p>Avaliação do Projeto</p></div><hr />";

        echo "<br /><label>Nome do Projeto <span class=\"style1\">*</span></label><br>";
        echo "<input type=text id='nome-proj' name='nome-proj' size=50 maxlength=50 
            title=\"teste\"
                onkeyup=\"validaNomeProjeto(this.id,this.value)\"/>";
        echo "<input type = \"checkbox\" id = \"confidencial \"name = \"confidencial\" 
                value = \"\" />Confidencial";
        echo "<br /><br /><label>Descrição do Projeto <span class=\"style1\">*</span></label><br>";
        echo "<textarea id='descr-proj' name='descr-proj' cols=60 rows=8 
                onkeyup=\"validaDescProjeto(this.id,this.value)\"></textarea>";

        $sql_tec = "select * from tecnologia";
        $tecnologias = mysql_query($sql_tec);

        echo "<br /><br /><label>Tecnologias utilizadas<br /></label>";
        echo "<select>";
        while ($row = mysql_fetch_array($tecnologias)) {
            echo "<option>" . $row['nome'] . "</option>";
        }
        echo "<option>Outra...</option>";
        echo "</select>";
        echo "<input type=button id='add-tec' value='Adicionar Tecnologia' />";
        echo "<br /><input type=text id='nome-tec' size=50 maxlength=50/>";
        echo "<br /><br /><label>Descrição da Tecnologia<br /></label>";
        echo "<textarea id='descr-tec' cols=60 rows=4></textarea>";
        ?>   
        <table>
            <tr>
                <td class="button"></td>
                <td class="button"></td>
                <td class="button"></td>
                <td>
                    <?php
                    $botao = "Iniciar questionario";
                    $js_onclick = "iniciaQuest();";
                    echo "<br><input class = \"button_prox\" name = \"next\" type = \"button\" 
                       value = \"" . $botao . "\" onclick=\"" . $js_onclick . "\"/>";
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>

