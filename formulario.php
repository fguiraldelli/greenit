<?php include("sessao.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="padrao.css">
        <script src="javascript.js"></script>
    </head>
    <body>

        <div class="geral">
            <div class="cabecalho">
                <?php include("cabecalho.php"); ?>
            </div>
            <div class="menu">
                <?php include("menu.php"); ?>
            </div>
            <div class="login">
                <?php
                session_start();
                //print $campoUser["nome"];
                if ($_SESSION["AUTH"] == true) {
                    echo $_SESSION["usuario"] . " ";
                    //echo time() - $_SESSION['TIME'];
                    echo " ," . " " . "<a href = " . "logout.php" . " >SAIR</a>";
                }
                if (time() - $_SESSION['TIME'] > 1800) {
                    session_destroy();
                    session_unset();
                }
                ?>

            </div>
            <div class="conteudo-form">
                <div class="breadcrumbs-form">
                    <a href="index.php">Início</a> >> <span>Formulário</span>
                </div>
                <?php
                include("connection.php");

                $q = $_GET['q'];
                /* Recupera a questao */
                if (($q == NULL) || ($q < 1))
                    header("location: formulario.php?q=1");
                else if(($q > 14))
                    header("location: index.php?r=tabela");
                $sql = "SELECT * FROM questoes where id = " . $q;
                $num_question = "SELECT count(*) FROM questoes";
                $resMAX = mysql_query($num_question);
                $MAX = mysql_fetch_array($resMAX);
                $res = mysql_query($sql);
                $cont = 0;
                while ($row = mysql_fetch_array($res)) {
                    $cont++;
                    echo "<div class = \"question-form\"><p>Questão " .
                    $q . " de " . $MAX[0] . "</p></div>";


                    echo /* $row['id'] . " " . */$row['questao'] . "<br>" . "<p>";
                    
                    /* Abre o formulario */
                    echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
                    /* Recupera as possiveis respostas */
                    $sql = "SELECT * FROM tipo_resposta WHERE tipo = " . $row['tipo'];
                    $resresp = mysql_query($sql);
                    while ($rowresp = mysql_fetch_array($resresp)) {
                        echo "<input class = radio type=\"radio\" name=\"" . $row['id'] . "\" value=\"" .
                        $rowresp['resp'] . "\"";
                        /* if(){

                          } */
                        echo "/>" . $rowresp['rotulo'];
                        echo "<input type=hidden name=\"q\" value=" . $q . " />";
                        echo "<input type=hidden name=\"op\" id=\"vaiprafrente\" value=" . $q . " />";
                    }
                }
                ?>
                <p>
                    <label class="cadastro">Se quiser justifique abaixo a sua resposta:</label><br>
                    <textarea name="just" wrap="VIRTUAL" id="mensagem" cols="54" rows="8" size="700"></textarea>
                </p>
                <p><table >
                    <tr>
                        <td>
                            <?php if ($q > 1) { ?>
                                <input class ="button"name="back" type="button" value="<< Anterior" onclick="mudaPagina('a');"/>
                            <?php } ?>
                        </td>
                        <td class="button"> </td>
                        <td>
                            <?php $botao = ""; if ($q != $MAX[0]){$botao = "Proximo >>";} else {$botao = "Finaliza";}?>
                            <?php $js_onclick = ""; if (strcmp($botao, "Finaliza") == 0){$js_onclick = "finaliza('p');";} else {$js_onclick = "mudaPagina('p');";}?>
                            <input class = "button_prox" name = "next" type = "button" value = "<?php echo $botao;?>" onclick="<?php echo $js_onclick;?>"/>
                        </td>
                    </tr>
                </table>
            </form>

            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div
    </body>
</html>
