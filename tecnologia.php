
<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
$idp = $_SESSION["idp"];
$titulo = $_SESSION["titulopj"];
?>
<div class="conteudo">
    <div class="breadcrumbs">
        <a href="index.php">Início</a> >> <span>Adicionar Projeto</span>
    </div>
    <div class="col-esquerda2">

        <p class="titulo"> Opções </p>
        <br />
        <a href="index.php?r=projeto" class="medium-button">
            Voltar </a>
        <br />
        <a href="index.php?r=pesquisa_projeto" class="medium-button">
            Pesquisar Projetos </a>
        <br />
        <a href="index.php?r=pesquisa_tecnologia" class="medium-button">
            Pesquisar Tecnologia </a>
    </div>
    <div class="col-direita2">


        <?php
        echo "<div id=\"titulo\" class=\"question-form\"><h1>" . 
                $titulo . "</h1></div><br>";
        /* Abre o formulario */


        $sql_tec = "select * from tecnologia";
        $tecnologias = mysql_query($sql_tec);

        echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
        echo "<input type=hidden name=\"vaiprafrente\" id=\"vaiprafrente\" />";
        echo "<input type=hidden name=\"q\" value=" . $q . " />";
        echo "<br /><br /><label>Tecnologias<br /></label>";
        echo "<select id=\"other\" onchange=\"hideText();\">";
        echo "<option>Outra...</option>";
        while ($row = mysql_fetch_array($tecnologias)) {
            echo "<option>" . $row['nome'] . "</option>";
        }
        echo "</select>";
        echo "<input type = \"checkbox\" id = \"tec-conf \"name = \"tec-conf\" 
                value = \"\" />Confidencial";

        echo "<br /><input type=text id='nome-tec' size=50 maxlength=50/><br>";
        echo "<input type=button id='add-tec' value='Adicionar Tecnologia' onclick=\"addTec(" . $idp . ");\"/>";
        echo "<div id=\"div-1b\"";
        echo "<br /><br /><label><label>Descrição da Tecnologia ";
        echo "<br /></label>";
        echo "<textarea id='descr-tec' cols=31 rows=8></textarea>";
        echo "<input name = \"ins_desc\" id = \"ins_desc\" type = \"button\" value=Salvar><br>";
        echo"</div>";
        echo "<div id = \"div-1a\">";
        echo "<br /><label>Tecnologias Utilizadas<br /></label>";
        echo "<select name=\"lista_tecnologia\" id=\"lista_tecnologia\" 
            size=\"8\" style=\"width: 267px;\" multiple=\"multiple\">";
        //recarrega as tecnologias que ja foram adicionadas
        $sql_tec = "SELECT t.id, t.nome FROM `tecnologia` t, `proj-tec` pt WHERE pt.idp=" .
                $idp . " AND pt.idt = t.id";

        $tecnologias = mysql_query($sql_tec);
        while ($row = mysql_fetch_array($tecnologias)) {
            echo "<option>" . $row['nome'] . "</option>";
        }
        // Terminou de recuperar as tecnologias adicionadas
        
        echo "</select>
        <input name = \"rem_desc\" id = \"ins_desc\" type = \"button\" value=Remover onclick=\"remTec(" . $idp . ");\"><br>";
        echo"</div>";
        ?>  
        <table id="table_button">
            <tr><br><br>
            <td>
                <?php
                $botao = "Iniciar questionario";
                $js_onclick = "iniciaQuest();";
                echo "<br><br><br><input class = \"button_prox\" name = \"next\" 
                    id=\"next\" type = \"button\" 
                       value = \"" . $botao . "\" onclick=\"" . $js_onclick . "\"/>";
                ?>
            </td>
            </tr>
        </table>
    </div>

    <div id="ajuda">

    </div>
</div>

