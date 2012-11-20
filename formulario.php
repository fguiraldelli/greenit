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
            <div class="conteudo">
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
                    echo $row['id'] . " " . $row['questao'] . "<br>";

                    /* Recupera as possiveis respostas */
                    $sql = "SELECT * FROM tipo_resposta WHERE tipo = " . $row['tipo'];
                    $resresp = mysql_query($sql);
                    while ($rowresp = mysql_fetch_array($resresp)) {
                        echo "<input type=\"radio\" name=\"" . $row['id'] . "\" value=\"" .
                        $rowresp['resp'] . "\"";
                        /* if(){

                          } */
                        echo "/>" . $rowresp['rotulo'];
                    }
                }
                ?>
            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div
    </body>
</html>