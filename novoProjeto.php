
<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
$idp = $_SESSION["idp"];
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
        /* Abre o formulario */
        echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
        echo "<input type=hidden name=\"vaiprafrente\" id=\"vaiprafrente\" />";
        echo "<input type=hidden name=\"q\" value=" . $q . " />";

        echo "<div class = \"question-form\"><p>Avaliação do Projeto</p></div><hr />";
        echo "<span class=\"style1\">* Campos com * são obrigatórios!</span><br>";
        echo "<br><label>Nome do Projeto <span class=\"style1\">*</span></label><br>";
        echo "<input type=text id='nome-proj' name='nome-proj' size=50 maxlength=50 
            title=\"teste\"
                onkeyup=\"validaNomeProjeto(this.id,this.value)\"/>";
        echo "<input type = \"checkbox\" id = \"proj-conf \"name = \"proj-conf\" 
                value = \"\" />Confidencial";
        echo "<br /><br /><label>Descrição do Projeto <span class=\"style1\">*</span></label><br>";
        echo "<textarea id='descr-proj' name='descr-proj' cols=60 rows=6
                onkeyup=\"validaDescProjeto(this.id,this.value)\"></textarea>";
        /*
        $sql_tec = "select * from tecnologia";
        $tecnologias = mysql_query($sql_tec);

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
        echo "<input type=button id='add-tec' value='Adicionar Tecnologia' onclick=\"addTec(".$idp.");\"/>";
        echo "<div id=\"div-1b\"";
        echo "<br /><br /><label><label>Descrição da Tecnologia ";
        echo "<br /></label>";
        echo "<textarea id='descr-tec' cols=31 rows=8></textarea>";
        echo "<input name = \"ins_desc\" id = \"ins_desc\" type = \"button\" value=Salvar><br>";
        echo"</div>";
        echo "<div id = \"div-1a\">";
        echo "<br /><label>Tecnologias Utilizadas<br /></label>";
        echo "<select name=\"lista_tecnologia\" id=\"lista_tecnologia\" 
            size=\"8\" style=\"width: 267px;\" multiple=\"multiple\">
        </select>
        <input name = \"rem_desc\" id = \"ins_desc\" type = \"button\" value=Remover onclick=\"remTec();\"><br>";
        echo"</div>";*/
        ?> 
        <table id="table_button2">
            <tr><br><br>
            <td>
                <?php
                $botao = "Continuar >>";
                $js_onclick = "adicionaTecnologia();";
                echo "<br><br><br><input class = \"button_prox\" name = \"next\" 
                    id=\"nexti\" type = \"button\" 
                       value = \"" . $botao . "\" onclick=\"" . $js_onclick . "\"/>";
                ?>
            </td>
            </tr>
        </table>
    </div>

    <div id="ajuda">

    </div>
</div>

