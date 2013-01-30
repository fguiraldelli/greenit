<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
$idp = $_SESSION["idp"];
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
        <?php
        echo "<form id = \"form3\" action=\"atualiza_projeto.php\" method=\"POST\">";
        echo "<input type=hidden name=\"nome-proj\" id=\"nome-proj\" />";
        echo "<input type=hidden name=\"tipo\" id=\"tipo\" />";
        echo "<input type=hidden name=projeto id=projeto />";

        $qpr = "SELECT * FROM projeto WHERE idp=" . $idp;
        $res = mysql_query($qpr);
        $proj = mysql_fetch_array($res);

        /* Novo Formulario */
        echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
        echo "<input type=hidden name=\"vaiprafrente\" id=\"vaiprafrente\" />";
        echo "<input type=hidden name=\"q\" value=" . $q . " />";

        echo "<div class = \"question-form\"><p>Detalhes do Projeto</p></div><hr />";
        echo "<label>Nome do Projeto</label><br>";
        echo "<input type=text id='nome-proj' name='nome-proj' size=50 maxlength=50 
            title=\"teste\" value =\"" . $proj['titulo'] . "\" disabled/>";
        echo "<input type = \"checkbox\" id = \"proj-conf \"name = \"proj-conf\" 
                value = \"\" disabled/>Confidencial<br>";
        $data = $proj['data'];
        $d = explode("-", $data);
        $data = $d[2] . "/" . $d[1] . "/" . $d[0];
        echo "<br><label>Data de Criação</label><br>";
        echo "<input type=text id='nome-proj' name='nome-proj' size=20 maxlength=10 
            title=\"teste\" value =\"" . $data . "\" disabled/>";

        echo "<br /><br /><label>Descrição do Projeto</label><br>";
        echo "<textarea id='descr-proj' name='descr-proj' cols=60 rows=10
                disabled>" . $proj['descr'] . "</textarea><br>";
        
        
        //Recupera as tecnologias
        $sql_tec = "SELECT t.id, t.nome FROM `tecnologia` t, `proj-tec` pt WHERE pt.idp=" .
                $idp . " AND pt.idt = t.id";
        // Se nao for o dono do projeto nao recupera as confidencias
        $res_idup = mysql_query("SELECT idu FROM `projeto` WHERE idp=" . $idp);
        $row_idup = mysql_fetch_array($res_idup);
        $idup = $row_idup["idu"];
        
        if($idu != $idup){
            $sql_tec = $sql_tec + " AND pt.confidencial=0";
        }
        
        $tecnologias = mysql_query($sql_tec);
        
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
         while ($row = mysql_fetch_array($tecnologias)) {
            echo "<option>" . $row['nome'] . "</option>";
        }
        echo"</select>
        <input name = \"rem_desc\" id = \"ins_desc\" type = \"button\" value=Remover onclick=\"remTec();\"><br>";
        echo"</div>";
        
        
        
        /* Vem até aqui */
        
        
        
       
        echo "<p><a href\"#\" 
                    onclick=\"loadMatrix('" . $proj['idp'] . "','" . $proj['titulo'] . "', 0);\"
                    id=\"botao_detalhe\" class=\"small-button\"> Ver Matriz </a> ";
        echo " <a href\"#\" 
                    onclick=\"loadMatrix('" . $proj['idp'] . "','" . $proj['titulo'] . "', 1);\"
                    id=\"botao_detalhe\" class=\"small-button\">
                    Editar Avaliação </a>";
        ?>
    </div>
</div>

