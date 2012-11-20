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
                <?php
                include("connection.php");

                $q = $_GET['q'];
                /* Recupera a questao */
                if (($q == NULL) || ($q < 1) || ($q > 14))
                    header("location: formulario.php?q=1");
                $sql = "SELECT * FROM questoes where id = " . $q;
                $res = mysql_query($sql);
                $cont = 0;
                while ($row = mysql_fetch_array($res)) {
                    $cont++;
                    echo $row['id'] . " " . $row['questao'] . "<br>" . "<p>";

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
                    }
                }
                ?>
                <p>
                    <label class="cadastro">Se quiser justifique abaixo a sua resposta:</label><br>
                    <textarea name="j" wrap="VIRTUAL" id="mensagem" cols="54" rows="8" size="700"></textarea>
                </p>
                <p><table >
                    <tr>
                        <td>
                            <input class ="button"name="back" type="submit" id="form" value="Anterior" onclick="return validaForm();"/>
                        </td>
                        <td class="button"> </td>
                        <td>
                            <input style="font-style: "class ="button"name="next" type="submit" id="form" value="Próxima" onclick="return validaForm();" />
                        </td>
                    </tr>
                </table>


            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div
    </body>
</html>